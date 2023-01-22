<?php

namespace abenevaut\Kite\Domain\Users\Users;

class UserPolicy
{
    /**
     * Determine if the given current user can update user.
     *
     * @param  User  $currentUser
     * @param  User  $user
     * @return bool
     */
    public function update(User $currentUser, User $user): bool
    {
        return $currentUser->id === $user->id;
    }
}
