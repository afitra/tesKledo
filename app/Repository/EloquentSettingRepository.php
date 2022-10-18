<?php

namespace App\Repository;

use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentSettingRepository implements SettingRepository
{
    protected $model;

    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function getSetting()
    {
        return $this->model->get()->first();
    }

   
}