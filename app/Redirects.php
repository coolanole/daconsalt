<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirects extends Model
{
    protected $fillable = ['link_id', 'ip', 'useragent'];

    public function link()
    {
        return $this->belongsTo(Links::class);
    }
}
