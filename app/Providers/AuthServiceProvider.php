<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Item;
use App\Policies\ItemPolicy;
use App\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Item::class => ItemPolicy::class,
        Post::class => PostPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
