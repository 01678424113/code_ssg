<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Source extends Eloquent {
    protected $collection = 'sources';
    public $timestamps = false;

    public function getObjectID() {
        return $this->attributes['_id'];
    }

}
