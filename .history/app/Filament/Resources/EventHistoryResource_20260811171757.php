<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventHistoryResource\Pages;
use App\Filament\Resources\EventHistoryResource\RelationManagers;
use App\Models\EventHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
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
                        TextInput::make('nama_event')->label('Nama Event')->required(),
                        Textarea::make('deskripsi')->label('Deskripsi')->required(),
                        TextInput::make('slug')->label('Slug')->required(),
                        DatePicker::make('tanggal_event')->label('Tanggal Event')->required(),
                        FileUpload::make('img')->label('Foto Event')->required(),
                        Select::make('category')->label('Category')->options([
                            'Workshop' => 'Workshop',
                            'Webinar' => 'Webinar',
                            'Pelatihan' => 'Pelatihan',
                            'Internal' => 'Internal',
                        ]),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_event')->label('Nama Event')->sortable()->searchable(),
                TextColumn::make('category')->label('Category')->sortable()->searchable(),
                TextColumn::make('tanggal_event')->label('Tanggal Event')->date()->sortable(),
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
