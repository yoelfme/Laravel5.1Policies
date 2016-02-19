<?php
namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before($user, $post)
    {
        return $user->isAdmin() ? true : null;
    }

    public function update($user, $post)
    {
        return $user->isAdmin() || $user->isAuthor($post);
    }
}
