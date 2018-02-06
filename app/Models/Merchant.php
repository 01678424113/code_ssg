<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Merchant extends Eloquent {
    protected $collection = 'merchants';
    public $timestamps = false;

    public function getObjectID(){
        return $this->attributes['_id'];
    }
}
