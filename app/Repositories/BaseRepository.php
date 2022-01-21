<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    protected function query()
    {
        return $this->model::query();
    }
}
