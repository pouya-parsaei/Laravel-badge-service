<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = ['title','required_number','icon_url','type','description'];

    public function scopeXp($query)
    {
        $query->where('type',0);
    }

    public function scopeTopic($query)
    {
        $query->where('type',1);
    }

    public function scopeReply($query)
    {
        $query->where('type',2);
    }
}
