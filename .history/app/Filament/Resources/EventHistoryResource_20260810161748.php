<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventHistoryResource\Pages;
use App\Filament\Resources\EventHistoryResource\RelationManagers;
use App\Models\EventHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventHistoryResource extends Resource
{
    protected static ?string $model = EventHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('Nama Event')->required(),
                        Textarea::make('Deskripsi')->required(),
                        TextInput::make('Slug')->required(),
                        DatePicker::make('Tanggal Event')->required(),
                        FileUpload::make('Img')->required(),
                        TextInput::make('Category')->required(),
                    ])
                    ->columns(2),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventHistories::route('/'),
            'create' => Pages\CreateEventHistory::route('/create'),
            'edit' => Pages\EditEventHistory::route('/{record}/edit'),
        ];
    }
}
