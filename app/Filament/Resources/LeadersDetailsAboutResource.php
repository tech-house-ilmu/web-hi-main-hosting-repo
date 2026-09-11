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

    protected static ?string $navigationLabel = 'Employees / Tim';

    protected static ?string $pluralLabel = 'Employees / Tim';

    protected static ?string $modelLabel = 'Employee';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('leaders_details_img')
                    ->label('Foto / Avatar')
                    ->image()
                    ->disk('public')
                    ->directory('leaders')
                    ->columnSpanFull()
                    ->nullable(),
                Forms\Components\TextInput::make('leaders_details_name')
                    ->label('Nama Lengkap')
                    ->required(),
                Forms\Components\Select::make('leaders_details_position')
                    ->label('Posisi / Jabatan')
                    ->options([
                        'CEO HI' => 'CEO HI',
                        'Vice President' => 'Vice President',
                        'Head of' => 'Head of',
                        'Staff' => 'Staff',
                    ])
                    ->required(),
                Forms\Components\Select::make('leaders_details_position_division')
                    ->label('Divisi')
                    ->options([
                        'CEO Office' => 'CEO Office',
                        'Human Capital' => 'Human Capital',
                        'Business Development' => 'Business Development',
                        'Marketing' => 'Marketing',
                        'Technology' => 'Technology',
                    ])
                    ->nullable(),
                Forms\Components\TextInput::make('leaders_details_sub_division')
                    ->label('Sub Divisi')
                    ->placeholder('Contoh: Web Development, Talent Acquisition, Finance')
                    ->nullable(),
                Forms\Components\TextInput::make('leaders_details_email')
                    ->label('Email')
                    ->email()
                    ->nullable(),
                Forms\Components\TextInput::make('leaders_details_linkedin')
                    ->label('Link LinkedIn')
                    ->url()
                    ->nullable(),
                Forms\Components\TextInput::make('order')
                    ->label('Urutan Tampilan')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('order')->label('#')->sortable(),
                Tables\Columns\ImageColumn::make('leaders_details_img')->label('Foto')->circular()->size(45),
                Tables\Columns\TextColumn::make('leaders_details_name')->label('Nama')->wrap()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('leaders_details_position')->label('Posisi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('leaders_details_position_division')->label('Divisi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('leaders_details_sub_division')->label('Sub Divisi')->searchable(),
                Tables\Columns\TextColumn::make('leaders_details_email')->label('Email')->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('leaders_details_position_division')
                    ->label('Divisi')
                    ->options([
                        'CEO Office' => 'CEO Office',
                        'Human Capital' => 'Human Capital',
                        'Business Development' => 'Business Development',
                        'Marketing' => 'Marketing',
                        'Technology' => 'Technology',
                    ]),
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
