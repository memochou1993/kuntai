<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\Item;

class ItemPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Item $item)
    {
        return $user->id == $item->user_id;
    }
}
