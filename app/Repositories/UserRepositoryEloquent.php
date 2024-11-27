<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\User;

class UserRepositoryEloquent implements UserRepositoryInterface

{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    public function bulkInsert(array $data): bool
    {
        return $this->model->insert($data);
    }

    public function createOrUpdateWithWhereCondition(array $where, array $params): object
    {
        return $this->model->updateOrCreate($where, $params);
    }

    public function getAllDataByWhereCondition(array $where, Array $columns = ['*']): Collection
    {
        return $this->model->select($columns)->where($where)->get();
    }

    public function getSingleDataByWhereCondition(array $where, array $columns = ['*']): ?object
    {
        return $this->model->select($columns)->where($where)->first();
    }

    public function deleteByQuery(array $where): bool
    {
        return $this->model->where($where)->delete();
    }

    public function bulkDelete(array $ids): bool
    {
        return $this->model->whereIn('id',$ids)->delete();
    }

    public function updateByWhereCondition(array $where, array $params): bool
    {
        return $this->model->where($where)->update($params);
    }

    public function getDataWithWhereIn(array $where, string $whereInColumn, array $whereInData, array $columns = ['*']): Collection
    {
        return $this->model->where($where)->whereIn( $whereInColumn , $whereInData)->select($columns)->get();
    }

    public function getDataByPagination(array $where, int $skip, int $limit, string $orderByColumn = 'id', string $order = 'desc', array $columns = ['*']): ?object
    {
        return $this->model->where($where)->select($columns)->skip($skip)->limit($limit)->orderBy($orderByColumn, $order)->get();
    }

    public function getCountByWhereCondition(array $where): int
    {
        return $this->model->where($where)->count();
    }
}
