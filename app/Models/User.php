<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent {

    protected $collection = 'users';
    public $timestamps = false;

    public function getObjectID() {
        return $this->attributes['_id'];
    }
}