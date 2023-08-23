<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainPageController extends Controller
{
    private $VALID_COOKIE_LIST = ['expo','online'];

    public function getView(Request $request) {
        return view('mainpage');
    }
}
