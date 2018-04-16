<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\Post;

class PostPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
}
