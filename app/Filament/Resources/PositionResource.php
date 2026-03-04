<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Filament\Resources\PositionResource\Pages\ViewPosition;
use App\Models\Division;
use App\Models\Position;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PositionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PositionResource\RelationManagers;
use App\Filament\Resources\PositionResource\Pages\EditPosition;
use App\Filament\Resources\PositionResource\Pages\ListPositions;
use App\Filament\Resources\PositionResource\Pages\CreatePosition;
use Filament\Forms\Components\RichEditor;

class PositionResource extends Resource
{
    protected static ?string $model = Position::class;

    protected static ?string $navigationLabel = 'Career';
    protected static ?string $label = 'Career';
    protected static ?string $pluralLabel = 'Careers';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('division_id')
                ->label('Divisi')
                ->relationship('division', 'name')
                ->required(),

            TextInput::make('title')
                ->label('Nama Posisi')
                ->required(),

            RichEditor::make('job_description')
                ->label('Job Description')
                // ->rows(5)
                ->required(),

            RichEditor::make('requirements')
                ->label('Requirements')
                // ->rows(5)
                ->required(),

            TextInput::make('apply_link')
                ->label('Link Apply (Google Form)')
                ->url()
                ->required(),

            Radio::make('is_visible')
                ->label('Tampilkan di Halaman Karier?')
                ->options([
                    true => 'Ya, tampilkan',
                    false => 'Tidak, sembunyikan',
                ])
                ->inline()
                ->default(true)
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('division.name')
                    ->label('Division')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Position')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Visible')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d/m/Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('division_id')
                    ->label('Division')
                    ->relationship('division', 'name')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit' => Pages\EditPosition::route('/{record}/edit'),
            // 'view' => ViewPosition::route('/{record}'),
        ];
    }
}
