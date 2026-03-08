<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function sale() {
        return view('frontend.sale');
    }
    public function purchase() {
        return view('frontend.purchase');
    }
    public function product() {
        return view('frontend.product');
    }
    public function company() {
        return view('frontend.company');
    }
    public function reports() {
        return view('frontend.reports');
    }
}
