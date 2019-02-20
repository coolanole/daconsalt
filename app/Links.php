<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GpsLab\Component\Base64UID\Base64UID;

/**
 * Class Links
 * @package App
 */
class Links extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->key = Base64UID::generate();
        parent::__construct($attributes);
    }

    protected $fillable = ['url', 'is_private'];
}
