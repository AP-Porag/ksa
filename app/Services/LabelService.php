<?php

namespace App\Services;


use App\Models\Label;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Str;
use App\Services\BaseService;

class LabelService extends BaseService
{

    protected $model;

    public function __construct()
    {
        $this->model = Label::class;
    }

    public function storeOrUpdate($data, $id = null)
    {
        try {
            return parent::storeOrUpdate($data, $id);
        } catch (\Exception $e) {
            $this->logFlashThrow($e);
        }
    }
}

