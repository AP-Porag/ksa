<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'label_info' => 'array',
    ];

    public function entry()
    {
        return  $this->belongsTo(Entry::class,'entry_id');
    }

    public function cardAuthenticator()
    {
        return $this->belongsTo(Authenticator::class, 'card_authenticator_name');
    }

    public function autoAuthenticator()
    {
        return $this->belongsTo(Authenticator::class, 'auto_authentication_authenticator_name');
    }

    public function combinedServiceAuthenticator()
    {
        return $this->belongsTo(Authenticator::class, 'combined_service_authenticator_name');
    }

    public function crossoverAuthenticator()
    {
        return $this->belongsTo(Authenticator::class, 'crossover_authenticator_name');
    }

    /* =========================================================
     * ITEM TYPE HELPERS
     * Works for old and new item types:
     * Card, Card (No Number), Card (Autographed), Card (Autographed) No Number,
     * Index Card, Combined Service, Combined Service (No Number),
     * Reholder, Autograph Authentication, Crossover
     * ========================================================= */

    /**
     * DB column prefix for this item type (null for Reholder).
     */
    public function typePrefix(): ?string
    {
        $type = (string) $this->itemType;

        if (str_starts_with($type, 'Card') || $type === 'Index Card') {
            return 'card';
        }
        if (str_starts_with($type, 'Combined Service')) {
            return 'combined_service';
        }
        if ($type === 'Autograph Authentication') {
            return 'auto_authentication';
        }
        if ($type === 'Crossover') {
            return 'crossover';
        }

        return null;
    }

    public function isReholder(): bool
    {
        return $this->itemType === 'Reholder';
    }

    public function isNoNumberType(): bool
    {
        return in_array($this->itemType, [
            'Card (No Number)',
            'Card (Autographed) No Number',
            'Combined Service (No Number)',
        ], true);
    }

    /**
     * Description one / two / three.
     */
    public function description(string $n): ?string
    {
        $prefix = $this->typePrefix();

        return $prefix ? $this->{$prefix . '_description_' . $n} : null;
    }

    public function serialNumber(): ?string
    {
        $prefix = $this->typePrefix();

        return $prefix ? $this->{$prefix . '_serial_number'} : null;
    }

    public function isAutographed(): bool
    {
        $prefix = $this->typePrefix();

        if (!$prefix) {
            return false;
        }

        return in_array((string) $this->{$prefix . '_autographed'}, ['1', 'true'], true);
    }

    public function authenticatorName(): ?string
    {
        $relation = [
            'card'                => 'cardAuthenticator',
            'combined_service'    => 'combinedServiceAuthenticator',
            'auto_authentication' => 'autoAuthenticator',
            'crossover'           => 'crossoverAuthenticator',
        ][$this->typePrefix()] ?? null;

        return $relation ? optional($this->{$relation})->name : null;
    }

    public function authenticatorCertNo(): ?string
    {
        $prefix = $this->typePrefix();

        return $prefix ? $this->{$prefix . '_authenticator_cert_no'} : null;
    }

    public function isCertifiedOnCard(): bool
    {
        $prefix = $this->typePrefix();

        if (!in_array($prefix, ['card', 'combined_service'], true)) {
            return false;
        }

        return in_array((string) $this->{$prefix . '_certified_on_card'}, ['1', 'true'], true);
    }

    public function estimatedValue(): ?string
    {
        if ($this->isReholder()) {
            return $this->reholder_estimated_value;
        }

        $prefix = $this->typePrefix();

        return $prefix ? $this->{$prefix . '_estimated_value'} : null;
    }

    public function itemGrade(): ?string
    {
        if ($this->isReholder()) {
            return $this->reholder_item_grade;
        }

        $prefix = $this->typePrefix();

        if ($prefix === 'auto_authentication') {
            return $this->auto_authentication_grade;
        }

        return $prefix ? $this->{$prefix . '_item_grade'} : null;
    }

    public function itemGradeMean(): ?string
    {
        if ($this->isReholder()) {
            return $this->reholder_item_grade_mean;
        }

        $prefix = $this->typePrefix();

        if (!$prefix || $prefix === 'auto_authentication') {
            return null;
        }

        return $this->{$prefix . '_item_grade_mean'};
    }

    public function autoGrade(): ?string
    {
        if ($this->isReholder()) {
            return $this->reholder_auto_grade;
        }

        $prefix = $this->typePrefix();

        return $prefix ? $this->{$prefix . '_auto_grade'} : null;
    }

    /**
     * Label / CSV row.
     * Description one = "Year, Manufacturer"
     * Description two = "Number, Player Name" (only "Player Name" for No Number types)
     */
    public function buildLabelInfo(): array
    {
        // Split on the first comma only
        $split = function ($text) {
            $parts = array_map('trim', explode(',', (string) $text, 2));

            return [$parts[0] ?? '', $parts[1] ?? ''];
        };

        $year = $manufacturer = $cardNumber = $nameOfCard = '';
        $details = $this->description('three');

        if ($this->itemType === 'Index Card') {
            // Index Card descriptions are free text
            $nameOfCard = (string) $this->description('one');
            $details = implode(' ', array_filter([
                $this->description('two'),
                $this->description('three'),
            ]));
        } elseif ($this->typePrefix()) {
            [$year, $manufacturer] = $split($this->description('one'));

            $descriptionTwo = (string) $this->description('two');

            if ($this->isNoNumberType()) {
                $nameOfCard = trim($descriptionTwo);
            } else {
                [$cardNumber, $nameOfCard] = $split($descriptionTwo);
            }
        } elseif ($this->isReholder()) {
            $details = null;
        }

        return [
            'id'            => $this->id,
            'Year'          => $year,
            'Manufacturer'  => $manufacturer,
            'Card Number'   => $cardNumber,
            'Name of Card'  => $nameOfCard,
            'Details'       => $details,
            'Serial Number' => $this->grading_cert_number,
            'Grade'         => $this->itemGrade(),
            'Grade Exp'     => $this->itemGradeMean(),
            'Auto Grade'    => $this->autoGrade(),
        ];
    }
}
