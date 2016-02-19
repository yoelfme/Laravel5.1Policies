<?php
namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update($user, $post)
    {
        return $user->isAuthor($post);
    }
}
