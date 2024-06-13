<?php

namespace App\Forms;

use App\Models\Category;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

final class ItemForm
{
    public static function schema(): array
    {
        return [
            TextInput::make('title')
                ->required()
                ->string()
                ->maxLength(255)
                ->notRegex('/&lt;|&gt;|&nbsp;|&amp;|[<>=]+/'),
            TextInput::make('url')
                ->prefix('https://')
                ->nullable()
                //->url()
                ->suffixIcon('heroicon-m-globe-alt'),
            DateTimePicker::make('created_at')
                ->hiddenOn('create'),
            Hidden::make('user_id')
                ->default(auth()->id() ?? 1),
            Select::make('category_id')
                ->required()
                ->native(false)
                ->label('Category')
                ->relationship('category', 'name')
                ->options(Category::all()->pluck('name', 'id'))
                ->createOptionForm([
                    TextInput::make('name')
                        ->required()
                        ->string()
                        ->maxLength(255)
                        ->notRegex('/&lt;|&gt;|&nbsp;|&amp;|[<>=]+/'),
                ]),
        ];
    }
}
