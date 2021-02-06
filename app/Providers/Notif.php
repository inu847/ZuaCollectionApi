<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Suggestion;

class Notif extends ServiceProvider
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
        $date = now()->format('Y-m-d 00:00:00');
        $msgToday = Suggestion::latest()->where('created_at', '>', $date)->paginate(3);
        $count = Suggestion::get()->where('created_at', '>', $date);

        \View::share(['msgToday' => $msgToday,
                      'date' => $date,
                      'count' => $count]);
    }
}
