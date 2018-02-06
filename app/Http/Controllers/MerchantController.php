<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends Controller {

    public function index(Request $request) {
        $response = [
            'title' => "Merchants"
        ];
        return view('merchant.index', $response);
    }

    public function doAdd(Request $request) {
        $slug = str_slug($request->input('txt-name'));
        try {
            $merchant = Merchant::select(['_id'])->where('slug', $slug)->first();
            if (empty($merchant)) {
                $merchant = new Merchant;
                $merchant->merchant_id = Merchant::max('merchant_id') + 1;
                $merchant->name = trim($request->input('txt-name'));
                $merchant->slug = $slug;
                $merchant->logo = $request->input('txt-logo');
                $merchant->website = $request->input('txt-website');
                $merchant->status = 1;
                $auth = $request->session()->get('user');
                $merchant->created = [
                    'at' => intval(microtime(true)),
                    'by' => [
                        '_id' => $auth->getObjectID(),
                        'user_id' => $auth->user_id,
                        'username' => $auth->username,
                    ]
                ];
                try {
                    $merchant->save();
                    return redirect()->back()->with('success', "Add merchant successfully");
                } catch (\Exception $exc) {
                    dd($exc->getMessage());
                }
            } else {
                return redirect()->back()->with('error', "Merchant already exist");
            }
        } catch (\Exception $exc) {
            dd($exc->getMessage());
        }
    }
}
