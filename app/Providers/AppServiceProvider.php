<?php

namespace App\Providers;

use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use App\Models\UserStat;
use App\Observers\ReplyObserver;
use App\Observers\TopicObserver;
use App\Observers\UserObserver;
use App\Observers\UserStatObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Topic::observe(TopicObserver::class);
        Reply::observe(ReplyObserver::class);
        UserStat::observe(UserStatObserver::class);
    }
}
