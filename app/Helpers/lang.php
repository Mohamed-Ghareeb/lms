<?php

function getLanguage()
{
    return app()->getLocale();
}

function isLang($langShortKey)
{
    return getLanguage() == $langShortKey;
}

function defaultLanguage()
{
    return getSettings()->default_app_lang ?? 'en';
}

function secondLanguage()
{
    $lang = 'ar';

    if (defaultLanguage() == 'ar') {
        $lang = 'en';
    }

    return $lang;
}

function getColumnLang($column)
{
    return (bool) $column ? $column[getLang()] ?? $column[secondLanguage()] ?? null : null;
}

function getLanguageForAssets()
{
    if (!isLang('ar')) return 'en';

    return getLanguage();
}

function getDirection()
{
    return isLang('ar') ? 'rtl' : 'ltr';
}

function getRtlDirection()
{
    return isLang('ar') ? '.rtl' : '';
}

function isRtl()
{
    return isLang('ar') ? true : false;
}

function getLang()
{
    return request()->wantsJson() ? hasLang() : app()->getLocale();
}

function hasLang()
{
    return (request()->has('lang') && request()->filled('lang')) ? request('lang') : 'ar';
}
