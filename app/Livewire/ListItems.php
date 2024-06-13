<?php

namespace App\Livewire;

use App\Forms\ItemForm;
use App\Models\Category;
use App\Models\Item;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ListItems extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function render()
    {
        return view('livewire.list-items');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Item::query())
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->width('30%')
                    ->url(fn(Item $item): string => $item->url)
                    ->openUrlInNewTab(),
                TextColumn::make('user.name')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Article' => 'info',
                        'Book' => 'warning',
                        'Course' => 'success',
                        'Video' => 'primary',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name')
            ])
            ->headerActions([
                CreateAction::make()
                    ->slideOver()
                    ->model(Item::class)
                    ->form(ItemForm::schema()),
            ])
            ->actions([
                EditAction::make()
                    ->slideOver()
                    ->form(ItemForm::schema()),
                DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped();
    }
}
