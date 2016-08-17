<?php
namespace App\Core;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct(Model $model = null)
    {
        $this->model = $model;
    }
    public function setModel(Model $model)
    {
        $this->model = $model;
    }
    public function getModel()
    {
        return $this->model;
    }

}
