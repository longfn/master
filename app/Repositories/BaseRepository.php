<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function paginate(array $input = [], $perPage = 10)
    {
        $total = count($input);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $offset = ($page - 1) * $perPage;
        $items = array_slice($items, $offset, $perPage);

        return new LengthAwarePaginator($items, $total, $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => LengthAwarePaginator::resolveQueryString(),
        ]);
    }

    public function save(array $inputs, array $conditions = [])
    {
        $validator = Validator::make($data, $conditions)->validate();

        return $this->model->create($inputs);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function deleteById($id)
    {
        return $this->findById($id)->delete();
    }
}
