<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
        return $this->userRepository->create($data);
    }

    public function bulkInsert(array $data): bool
    {
        return $this->userRepository->bulkInsert($data);
    }

    public function createOrUpdateWithWhereCondition(array $where, array $params): object
    {
        return $this->userRepository->createOrUpdateWithWhereCondition($where,$params);
    }

    public function getAllDataByWhereCondition(array $where, Array $columns = ['*']): Collection
    {
        return $this->userRepository->getAllDataByWhereCondition($where, $columns);
    }

    public function getSingleDataByWhereCondition(array $where, array $columns = ['*']): ?object
    {
        return $this->userRepository->getSingleDataByWhereCondition($where, $columns);
    }

    public function deleteByQuery(array $where): bool
    {
        return $this->userRepository->deleteByQuery($where);
    }

    public function bulkDelete(array $ids): bool
    {
        return $this->userRepository->bulkDelete($ids);
    }

    public function updateByWhereCondition(array $where, array $params): bool
    {
        return $this->userRepository->updateByWhereCondition($where, $params);
    }

    public function getDataWithWhereIn(array $where, string $whereInColumn, array $whereInData, array $columns = ['*']): Collection
    {
        return $this->userRepository->getDataWithWhereIn($where, $whereInColumn, $whereInData, $columns);
    }

    public function getDataByPagination(array $where, int $skip, int $limit, string $orderByColumn = 'id', string $order = 'desc', array $columns = ['*']): ?object
    {
        return $this->userRepository->getDataByPagination($where, $skip, $limit, $orderByColumn, $order, $columns);
    }

    public function getCountByWhereCondition(array $where): int
    {
        return $this->userRepository->getCountByWhereCondition($where);
    }
}
