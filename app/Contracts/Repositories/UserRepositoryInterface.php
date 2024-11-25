<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function bulkInsert(array $data): bool;

    public function createOrUpdateWithWhereCondition(array $where, array $params): object;

    public function getAllDataByWhereCondition(array $where, array $columns = ['*']): Collection;

    public function getSingleDataByWhereCondition(array $where, array $columns = ['*']): ?object;

    public function deleteByQuery(array $where): bool;

    public function updateByWhereCondition(array $where, array $params): bool;

    public function getDataWithWhereIn(array $where, string $whereInColumn, array $whereInData, array $columns = ['*']): Collection;

    public function getDataByPagination(array $where, int $skip, int $limit, string $orderByColumn = 'id', string $order = 'desc', array $columns = ['*']): ?object;

    public function getCountByWhereCondition(array $where): int;

}
