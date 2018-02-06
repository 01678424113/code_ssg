<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crawler;

class TestController extends Controller
{
    public function index()
    {
    /*    $product = Crawler::to('https://www.blibli.com/samsung-galaxy-j7-pro-smartphone-black-32gb-3gb-d-MTA.1251362.htm', 'handphone')
            ->type('detail')
            ->get();
        dd($product);*/
         $links = Crawler::to('https://www.blibli.com/handphone/54593', 'handphone')->getLinks();
         dd($links);
    }
}
