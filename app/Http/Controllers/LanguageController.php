<?php

namespace App\Http\Controllers;

use App\Utils\MultiLanguageManager;

class LanguageController extends Controller
{
    public function changeLanguage($language = null)
    {
        MultiLanguageManager::changeLanguage($language);

        return back();
    }

    public function getLanguage()
    {
        return MultiLanguageManager::getLanguage();
    }
}
