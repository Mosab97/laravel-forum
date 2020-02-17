<?php

namespace App;


class Discussion extends Model
{

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
