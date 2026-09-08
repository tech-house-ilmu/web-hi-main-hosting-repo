<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadersDetailsAboutResource\Pages;
use App\Models\LeadersDetailsAbout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LeadersDetailsAboutResource extends Resource
{
    protected static ?string $model = LeadersDetailsAbout::class;

    protected static ?string $navigationLabel = 'Chief dan VP';

    protected static ?string $pluralLabel = 'Chief dan VP';

    protected static ?string $modelLabel = 'Data';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('leaders_details_img')
                    ->label('Gambar Leader')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('leaders_details_name')
                    ->label('Nama Leader')
                    ->required(),
                Forms\Components\Select::make('leaders_details_position')
                    ->label('Posisi')
                    ->options([
                        'CEO' => 'CEO',
                        'COO' => 'COO',
                        'CTO' => 'CTO',
                        'CFO' => 'CFO',
                        'CMO' => 'CMO',
                        'VP' => 'VP',
                        // 'Head Of' => 'Head Of',
                    ])
                    ->reactive()
                    ->required(),
                Forms\Components\TextInput::make('leaders_details_position_division')
                    ->label('Divisi')
                    ->placeholder('Contoh: Technology, Marketing')
                    ->visible(fn ($get) => in_array($get('leaders_details_position'), ['VP']))
                    ->required(fn ($get) => in_array($get('leaders_details_position'), ['VP'])),
                Forms\Components\TextInput::make('leaders_details_linkedin')
                    ->label('Link LinkedIn Leader')
                    ->required(),
                Forms\Components\TextInput::make('leaders_details_email')
                    ->label('Link Email Leader')
                    ->email()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('leaders_details_img')->label('Gambar')->size(150),
                Tables\Columns\TextColumn::make('leaders_details_name')->label('Nama')->wrap()->searchable(),
                Tables\Columns\TextColumn::make('leaders_details_position')->label('Posisi')->searchable(),
                Tables\Columns\TextColumn::make('leaders_details_linkedin')->label('LinkedIn'),
                Tables\Columns\TextColumn::make('leaders_details_email')->label('Email'),
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
            'index' => Pages\ListLeadersDetailsAbouts::route('/'),
            'create' => Pages\CreateLeadersDetailsAbout::route('/create'),
            'edit' => Pages\EditLeadersDetailsAbout::route('/{record}/edit'),
        ];
    }
}
