<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MetaTagsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $meta['title'] = 'Peparprov 2023 '; 
            $meta['description'] = 'Persiapkan diri anda untuk Pekan Paralimpik Provinsi (PEPARPROV) Jawa Tengah IV Di Kabupaten Pati Tahun 2023'; 
            $meta['twitter'] = '@npcjateng'; 
            $meta['keyword'] = 'peparprov, npc jateng, paralympic'; 
            $meta['site'] = 'peparprov.npcjateng.com'; 
            $meta['image'] = asset('images/simple-peparpov-2023.png'); 
            $view->with('meta', $meta);
        });
    }
}
