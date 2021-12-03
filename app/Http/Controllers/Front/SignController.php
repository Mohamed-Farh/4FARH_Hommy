<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignController extends Controller
{
    //----------------- Show contact In The Website  ------------------
    public function sign_in__up_page()
    {
        // toastr()->error(trans('لا يمكن حذف هذه الداتا لوجود نتائج متعلقة بها'));
        return view('includes.frontpages.sign-in-up');
    }
}
