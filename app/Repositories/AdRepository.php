<?php

namespace App\Repositories;

use App\Interfaces\AdRepositoryInterface;
use App\Models\Ad;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 *
 */
class AdRepository implements AdRepositoryInterface
{
    /**
     * @param array $filters
     * @return Collection
     */
    public function getAll(array $filters = []): Collection
    {
        $cacheKey = 'ads_' . md5(json_encode($filters));

        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($filters) {
            $query = Ad::query();

            if (!empty($filters['category'])) {
                $query->where('category', $filters['category']);
            }

            if (!empty($filters['date'])) {
                $query->whereDate('published_at', $filters['date']);
            }

            return $query;
        });
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function getById(int $id): ?object
    {
        return Ad::find($id);
    }

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object
    {
        return Ad::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $ad = Ad::find($id);
        return $ad ? $ad->update($data) : false;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $ad = Ad::find($id);
        return $ad ? $ad->delete() : false;
    }
}
