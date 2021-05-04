<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use Exception;

class LocaleServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->set_locale(true);
    }

    /**
     * @throws Exception
     */
    protected function set_locale($enable_locale = false)
    {
        $locale = config()->get('app.locale');
        $locale_default = config()->get('app.fallback_locale');
        $locales_config = config()->get('app.locales');
        if (!$locales_config) {
            throw new Exception("You must specify locales array in project_root/config/app.php as shown: 'locales' => [
              'ru' => ['title' => 'ru', 'prefix'=>'ru', 'db_prefix' => 'ru_', 'locale' => 'ru_RU.utf8', 'icon' => '/img/locals/ru.png'],
              'en' => ['title' => 'en', 'prefix'=>'en', 'db_prefix' => 'en_', 'locale' => 'en_EN.utf8', 'icon' => '/img/locals/en.png'],
            ]");
        }
        if (!isset($locales_config[$locale_default])):
            throw new Exception('Your config.locales array must contain config.fallback_locale in project_root/config/app.php');
        endif;
        $locales = array_keys($locales_config);
        $locale_in_url = request()->segment(1);
        if (in_array($locale_in_url, $locales)) {
            $locale = $locale_in_url;
            app()->setLocale($locale);
            session()->put('locale', $locale);
            $locale_to_route = $locale;
        } else {
            $locale = $locale_default;
            app()->setLocale($locale);
            session()->put('locale', $locale);
            $locale_to_route = $enable_locale ? '' : $locale;
        }
        config()->set('route_prefix', $locale_to_route);
    }
}
