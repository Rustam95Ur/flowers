<?php

namespace App;

class Locale
{
    public static  function lang()
    {
        $language = app()->getLocale();
        $languages = config()->get('app.locales');
        $language = $languages[$language];
        $language = $language['name'];
        return $language;
    }
}

