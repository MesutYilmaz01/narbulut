<?php

namespace App\Http\Repository;

use app\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository {

    /**
     * @return Collection
     */
    public function getAll(): ?Collection
    {
        return User::all();
    }

    /**
     * @param array $condition
     * @return mixed
     */
    public function getByCondition(array $condition)
    {
        return User::where($condition)->first();
    }
}
