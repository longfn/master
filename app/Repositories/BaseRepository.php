<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function paginate(array $input = [], $perPage = 10)
    {
        if (empty($input)) { // Collection->all() ==> array :D
            $input = $this->model->all()->all();
        }
        $total = count($input);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $offset = ($page - 1) * $perPage;
        $items = array_slice($input, $offset, $perPage);

        return new LengthAwarePaginator($items, $total, $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => LengthAwarePaginator::resolveQueryString(),
        ]);
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
