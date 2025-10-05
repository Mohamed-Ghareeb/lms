<?php

namespace App\Utils;

class MultiLanguageManager
{
    /**
     * Changes the application's language setting.
     *
     * If a valid language is provided, it saves the language preference.
     * Otherwise, it defaults to saving the application's fallback locale.
     *
     * @param  string|null  $language  The language code to set. If null or invalid, the fallback locale will be used.
     */
    public static function changeLanguage($language)
    {
        if ((bool) $language) {
            static::saveLanguage($language);
        } else {
            static::saveLanguage(config('app.fallback_locale')); // en fallback
        }
    }

    /**
     * Saves the language preference for the current user or session.
     *
     * If the user is authenticated, the language preference is saved to the user's profile.
     * If the user is not authenticated but a session language exists, the session language is updated.
     * Otherwise, the language is saved as a new session preference.
     *
     * @param  string  $language  The language code to save.
     * @return string The saved language code.
     */
    protected static function saveLanguage($language)
    {
        if (auth()->check()) {
            static::saveLanguageForUser($language);
        } elseif (session()->has('local')) {
            static::saveLanguageInSession($language, true);
        } else {
            static::saveLanguageInSession($language);
        }

        return $language;
    }

    /**
     * Saves the language preference to the authenticated user's profile.
     *
     * Updates the user's `lang` attribute with the provided language code.
     *
     * @param  string  $language  The language code to save.
     */
    protected static function saveLanguageForUser($language)
    {
        auth()->user()->update(['lang' => $language]);
    }

    /**
     * Saves the language preference in the session.
     *
     * If the session preference already exists, it will be forgotten before being set.
     * Otherwise, the language is saved as a new session preference.
     *
     * @param  string  $language  The language code to save.
     * @param  bool  $exists  Whether the session preference already exists.
     */
    protected static function saveLanguageInSession($language, $exists = false)
    {
        if ($exists) {
            session()->forget('local');
        }

        session()->put('local', $language);
    }

    /**
     * Retrieves the current language setting.
     *
     * If the user is authenticated, it returns the language preference from the user's profile.
     * If a session language is set, it returns the session's language preference.
     * Otherwise, it returns the application's fallback locale.
     *
     * @return string The current language code.
     */
    public static function getLanguage()
    {
        if (auth()->check()) {
            return static::getLanguageFromUser();
        } elseif (session()->has('local')) {
            return static::getLanguageFromSession();
        } else {
            return config('app.fallback_locale');
        }
    }

    /**
     * Retrieves the language preference from the authenticated user's profile.
     *
     * Returns the language code from the user's profile if it exists.
     * Otherwise, returns the application's fallback locale.
     *
     * @return string The language code from the user's profile or the fallback locale.
     */
    protected static function getLanguageFromUser()
    {
        $lang = auth()->user()->lang;

        return (bool) $lang ? $lang : config('app.fallback_locale');
    }

    /**
     * Retrieves the language preference from the session.
     *
     * Returns the language code stored in the session under the 'local' key.
     * If no language code is set in the session, it returns null.
     *
     * @return string|null The language code from the session or null if not set.
     */
    protected static function getLanguageFromSession()
    {
        return session()->get('local');
    }
}
