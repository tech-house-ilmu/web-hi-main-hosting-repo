<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Filament\Resources\TestimoniResource\RelationManagers;
use App\Models\Testimoni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationLabel = 'Testimoni User';
    protected static ?string $pluralLabel = 'Testimoni User';
    protected static ?string $modelLabel = 'Data';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\FileUpload::make('testimoni_img')
            ->label('Gambar Testimoni User')
            ->required(),
            Forms\Components\Textarea::make('testimoni_description')
            ->label('Deskripsi Testimoni User')
            ->rows(10)
            ->required(),
            Forms\Components\TextInput::make('testimoni_name')
            ->label('Nama Testimoni User')
            ->required(),
            Forms\Components\TextInput::make('testimoni_position')
            ->label('Posisi Testimoni User')
            ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\ImageColumn::make('testimoni_img')->label('Gambar Testimoni')->size(100),
            Tables\Columns\TextColumn::make('testimoni_name')->label('Nama'),
            Tables\Columns\TextColumn::make('testimoni_position')->label('Posisi'),
            Tables\Columns\TextColumn::make('testimoni_description')
            ->limit(50)
            ->label('Deskripsi')
            ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

            Tables\Columns\TextColumn::make('created_at')
            ->label('Dibuat')
            ->dateTime('d/m/Y H:i')
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }    
}
