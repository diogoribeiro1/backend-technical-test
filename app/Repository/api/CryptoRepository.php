<?php

namespace App\Repository\api;

use App\Models\Crypto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class CryptoRepository
{
    const PAGINATION_SIZE = 15;

    private Builder $query;

    public function __construct()
    {
        $this->query = Crypto::query();
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->query->paginate(self::PAGINATION_SIZE);
    }

    public function create(array $payload): Crypto
    {
        return $this->query->create($payload);
    }

    public function find(int $id): Crypto
    {
        return $this->query->findOrFail($id);
    }

    public function existsCoinByDate(string $date, string $coin): bool
    {
        return $this->query->where('date', $date)->where('coin', $coin)->exists();
    }

    public function findCoinByDate(string $date, string $coin): array
    {
        return $this->query->where('date', $date)->where('coin', $coin)->get()->toArray();
    }

}
