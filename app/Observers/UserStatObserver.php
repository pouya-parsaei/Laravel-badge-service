<?php

namespace App\Observers;

use App\Models\UserStat;
use App\Services\Badge\BadgeApplier;

class UserStatObserver
{
    /**
     * Handle the UserStat "created" event.
     *
     * @param  \App\Models\UserStat  $userStat
     * @return void
     */
    public function created(UserStat $userStat)
    {
        //
    }

    /**
     * Handle the UserStat "updated" event.
     *
     * @param  \App\Models\UserStat  $userStat
     * @return void
     */
    public function updated(UserStat $userStat)
    {
        resolve(BadgeApplier::class)->apply($userStat);
    }

    /**
     * Handle the UserStat "deleted" event.
     *
     * @param  \App\Models\UserStat  $userStat
     * @return void
     */
    public function deleted(UserStat $userStat)
    {
        //
    }

    /**
     * Handle the UserStat "restored" event.
     *
     * @param  \App\Models\UserStat  $userStat
     * @return void
     */
    public function restored(UserStat $userStat)
    {
        //
    }

    /**
     * Handle the UserStat "force deleted" event.
     *
     * @param  \App\Models\UserStat  $userStat
     * @return void
     */
    public function forceDeleted(UserStat $userStat)
    {
        //
    }
}
