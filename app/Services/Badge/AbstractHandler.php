<?php

namespace App\Services\Badge;

use App\Models\UserStat;

abstract class AbstractHandler implements Handler
{
    private $nextHandler;

    public function setNext(Handler $handler)
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(UserStat $userStat)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($userStat);
        }

        return null;
    }

    protected function applyBadge($userStat)
    {
        $availableBadges = $this->getAvailableBadges($userStat);

        $userBadges = $userStat->user->badges;
        
        $notReceivedBadge = $availableBadges->diff($userBadges);

        if ($notReceivedBadge->isEmpty()) return;

        $userStat->user->badges()->attach($notReceivedBadge);
    }

    abstract protected function getAvailableBadges($userStat);
}
