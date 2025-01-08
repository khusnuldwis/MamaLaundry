<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, User $model)
    {
        return $user->role_id === 1 || $user->id === $model->id; // Mengizinkan admin atau pengguna itu sendiri
    }
    public function __construct()
    {
        //
    }
}
