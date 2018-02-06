<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Merchant;
use MongoDB\BSON\ObjectID;

class CategoryController extends Controller {
    public function index(Request $request) {

        $response = [
            'title' => "Categories"
        ];
        $response['categories'] = Category::recursive();
        return view('category.index', $response);
    }

    public function doAdd(Request $request) {
        $category = new Category;
        $category->category_id = Category::max('category_id') + 1;
        $category->name = trim($request->input('txt-name'));
        $category->slug = str_slug($request->input('txt-name'));
        $category->status = 1;
        $category->level = 1;
        $category->parent = null;
        if ($request->has('sl-parent') && !empty($request->input('sl-parent'))) {
            $category_parent = Category::select([
                "_id",
                "category_id",
                "name",
                "slug",
                "level",
                "parent"
            ])
                ->where('_id', new ObjectID($request->input('sl-parent')))
                ->first();
            if (!empty($category_parent)) {
                $category->level = $category_parent->level + 1;
                $category->parent = [
                    '_id' => $category_parent->getObjectID(),
                    'category_id' => $category_parent->category_id,
                    'name' => $category_parent->name,
                    'slug' => $category_parent->slug,
                    'parent' => $category_parent->parent
                ];
            }
        }
        $auth = $request->session()->get('user');
        $category->created = [
            'at' => intval(microtime(true)),
            'by' => [
                '_id' => $auth->getObjectID(),
                'user_id' => $auth->user_id,
                'username' => $auth->username,
            ]
        ];
        try {
            $category->save();
            return redirect()->back()->with('success', "Add category successfully");
        } catch (\Exception $exc) {
            dd($exc->getMessage());
        }
    }
}
