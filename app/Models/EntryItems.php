<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryItems extends Model
{
    use HasFactory;

    protected $guarded = [];

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
}
