<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    private $lang = [
        'vi',
        'en',
    ];
    public function changeLanguage(Request $request, $lang)
    {
        if (in_array($lang, $this->lang)) {
            $request->session()->put(['lang' => $lang]);

            return redirect()->back();
        }
    }
}
