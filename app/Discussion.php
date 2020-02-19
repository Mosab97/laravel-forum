<?php

namespace App;


class Discussion extends Model
{
protected $table = 'discussions';
    public function author()
    {
      return  $this->belongsTo(User::class,'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class,'reply_id');
    }

    public function getBestReply()
    {
        return Reply::findorFail($this->reply_id);
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id
        ]);
    }





}
