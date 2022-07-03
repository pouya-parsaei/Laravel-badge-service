<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStat extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRequiredTopicsNumber(): int
    {
        return ($this->topic_count * Topic::XP);
    }

    public function getRequiredRepliesNumber(): int
    {
        return ($this->reply_count * Reply::XP);
    }
}
