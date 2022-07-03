<?php

namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\Topic;
use App\Models\UserStat;

class TopicHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('topic_count')) $this->applyBadge($userStat);

        return parent::handle($userStat);
    }

    protected function getAvailableBadges($userStat)
    {
        return Badge::topic()
            ->where('required_number', '<=', $userStat->xp)
            ->where('required_number','<=', $userStat->getRequiredTopicsNumber())
            ->get();
    }
}
