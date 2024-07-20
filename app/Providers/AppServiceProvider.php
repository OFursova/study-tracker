<?php

namespace App\Providers;

use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentColor::register([
            'cyan' => Color::Cyan,
            'emerald' => Color::Emerald,
            'fuchsia' => Color::Fuchsia,
            'indigo' => Color::Indigo,
            'lime' => Color::Lime,
            'neutral' => Color::Neutral,
            'orange' => Color::Orange,
            'pink' => Color::Pink,
            'purple' => Color::Purple,
            'rose' => Color::Rose,
            'sky' => Color::Sky,
            'slate' => Color::Slate,
            'stone' => Color::Stone,
            'teal' => Color::Teal,
            'violet' => Color::Violet,
            'warning' => Color::Orange,
            'yellow' => Color::Yellow,
            'zinc' => Color::Zinc,
        ]);
    }
}
