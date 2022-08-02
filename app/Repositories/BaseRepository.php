<?php

namespace App\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function getAll(array $input = [])
    {
        // TODO: Handle search() and filter() here

        return $this->model->all();
    }

    public function paginate(array $input = [], $perPage = 10)
    {
        $query = $this->model->query();
        // TODO: Handle filter() and sort() here

        return $query->paginate($perPage);
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->model->updateOrCreate($conditions, $inputs);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function deleteById($id)
    {
        return $this->model->destroy($id);
    }
}
