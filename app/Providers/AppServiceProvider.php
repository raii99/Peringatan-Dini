<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Skip migration jika tabel sudah ada
        Schema::defaultStringLength(191);
    }
}