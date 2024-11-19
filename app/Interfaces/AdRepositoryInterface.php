<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface AdRepositoryInterface
{
    /**
     * @param array $filters
     * @return Collection
     */
    public function getAll(array $filters = []): Collection;

    /**
     * @param int $id
     * @return object|null
     */
    public function getById(int $id): ?object;

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
