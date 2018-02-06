<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crawler;

class HomeController extends Controller {
    public function index() {
        $response = [
            'title' => 'Home'
        ];
        return view('home', $response);
    }
}
