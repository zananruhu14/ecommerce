<?php

use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage($lang)
    {
        session()->put('locale', $lang);

        App::setLocale($lang);

        return redirect()->back();
    }
}