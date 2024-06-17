<?php

namespace App\Forms;

use App\Models\Category;
use App\Models\Topic;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;

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
            Hidden::make('user_id')
                ->default(auth()->id() ?? 1),
            Fieldset::make('Settings')
                ->schema([
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
                    DateTimePicker::make('created_at')
                        ->hiddenOn('create'),
                    CheckboxList::make('topics')
                        ->relationship(
                            name: 'topics',
                            titleAttribute: 'name',
                            modifyQueryUsing: fn (Builder $query) => $query->orderBy('name')
                        )
                        ->bulkToggleable()
                        ->columns(6)
                        ->columnSpanFull(),
                    Actions::make([
                        Action::make('Create topic')
                            ->form([
                                TextInput::make('name')
                                    ->required()
                                    ->string()
                                    ->maxLength(255)
                                    ->notRegex('/&lt;|&gt;|&nbsp;|&amp;|[<>=]+/'),
                            ])
                            ->action(fn(array $data) => Topic::create($data))
                    ]),
                ]),
        ];
    }
}
