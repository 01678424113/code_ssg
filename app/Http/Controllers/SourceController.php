<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\Source;
use MongoDB\BSON\ObjectID;

class SourceController extends Controller {
    public function index(Request $request) {
        $response = [
            'title' => "Sources"
        ];
        $response['categories'] = Category::recursive();
        return view('source.index', $response);
    }

    public function doAdd(Request $request) {
        $source = new Source;
        $source->source_id = Source::max('source_id') + 1;
        $source->status = 1;
        $category = Category::select([
            "_id",
            "category_id",
            "name",
        ])
            ->where('_id', new ObjectID($request->input('sl-category')))
            ->first();
        if (!empty($category)) {
            $source->category = [
                '_id' => $category->getObjectID(),
                'category_id' => $category->category_id,
                'name' => $category->name
            ];
        }
        $source->link = trim($request->input('txt-link'));
        $url_parse = parse_url($source->link);
        if (isset($url_parse['host'])) {
            $merchant = Merchant::select([
            ])->where('website', $url_parse['host'])
                ->first();
            if (!empty($merchant)) {
                $source->merchant = [
                    '_id' => $merchant->getObjectID(),
                    "merchant_id" => $merchant->merchant_id,
                    "name" => $merchant->name,
                    "website" => $merchant->website
                ];
            }
        }
        $auth = $request->session()->get('user');
        $source->created = [
            'at' => intval(microtime(true)),
            'by' => [
                '_id' => $auth->getObjectID(),
                'user_id' => $auth->user_id,
                'username' => $auth->username,
            ]
        ];
        try {
            $source->save();
            return redirect()->back()->with('success', "Add source successfully");
        } catch (\Exception $exc) {
            dd($exc->getMessage());
        }
    }
}
