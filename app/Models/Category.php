<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent {
    protected $collection = 'categories';
    public $timestamps = false;

    public function getObjectID() {
        return $this->attributes['_id'];
    }

    public static function recursive($level = 1, $parent = null, $fields = ['_id', 'category_id', 'name', 'slug']) {
        $categories_query = self::select($fields)
            ->where([
                'level' => $level,
                'status' => 1
            ])
            ->orderBy('order', 'ASC');
        if (is_null($parent)) {
            $categories_query->whereNull('parent');
        } else {
            $categories_query->where('parent._id', $parent);
        }
        $categories = $categories_query->get();
        foreach ($categories as $category) {
            $category->child = self::recursive($level + 1, $category->getObjectID(), $fields);
        }
        return $categories;
    }
}
