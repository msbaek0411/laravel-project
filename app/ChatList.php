<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ChatList extends Model
{
    use Searchable;

    protected $guarded = [];

    public function userId()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
