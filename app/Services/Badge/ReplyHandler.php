<?php

namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\Reply;
use App\Models\UserStat;

class ReplyHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('reply_count')) $this->applyBadge($userStat);

        return parent::handle($userStat);
    }

    protected function getAvailableBadges($userStat)
    {
        return Badge::reply()
            ->where('required_number', '<=', $userStat->xp)
            ->where('required_number','<=', $userStat->getRequiredRepliesNumber())
            ->get();
    }
}
