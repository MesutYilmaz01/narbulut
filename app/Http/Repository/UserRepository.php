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

    /**
     * @param User $user
     * @return bool
     */
    public function store(User $user)
    {
        return $user->save();
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function isExist(string $email) {
        return User::where('email',$email)->exists();
    }
}
