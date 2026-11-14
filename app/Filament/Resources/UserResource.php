<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Manajemen Akun';

    protected static ?string $modelLabel = 'Akun Admin';

    protected static ?string $pluralModelLabel = 'Manajemen Akun Admin';

    public static function canViewAny(): bool
    {
        return auth()->user()?->isSuperAdmin() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->helperText(fn (string $context): ?string => $context === 'edit' ? 'Kosongkan jika tidak ingin mengubah password' : null),

                Select::make('role')
                    ->label('Role')
                    ->options([
                        User::ROLE_SUPERADMIN => 'Superadmin',
                        User::ROLE_ADMIN_DIVISI => 'Admin Divisi',
                        User::ROLE_ADMIN_SUB => 'Admin Sub',
                    ])
                    ->default(User::ROLE_ADMIN_DIVISI)
                    ->required(),

                Select::make('division')
                    ->label('Divisi')
                    ->options(User::DIVISIONS)
                    ->nullable()
                    ->helperText('Pilih divisi (Marketing, Partnership, HC, Prodev, Tech)'),

                TextInput::make('subrole')
                    ->label('Subrole / Tanggung Jawab')
                    ->placeholder('Contoh: Content Creator, UI/UX, Recruiter, dsb.')
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->label('Akun Aktif')
                    ->default(true)
                    ->helperText('Jika dinonaktifkan, akun tidak dapat mengakses panel admin /admin.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role')
                    ->label('Role')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        User::ROLE_SUPERADMIN => 'Superadmin',
                        User::ROLE_ADMIN_DIVISI => 'Admin Divisi',
                        User::ROLE_ADMIN_SUB => 'Admin Sub',
                        default => $state ?? '-',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        User::ROLE_SUPERADMIN => 'danger',
                        User::ROLE_ADMIN_DIVISI => 'info',
                        User::ROLE_ADMIN_SUB => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('division')
                    ->label('Divisi')
                    ->badge()
                    ->color('primary')
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('subrole')
                    ->label('Subrole')
                    ->placeholder('-')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Filter Role')
                    ->options([
                        User::ROLE_SUPERADMIN => 'Superadmin',
                        User::ROLE_ADMIN_DIVISI => 'Admin Divisi',
                        User::ROLE_ADMIN_SUB => 'Admin Sub',
                    ]),

                SelectFilter::make('division')
                    ->label('Filter Divisi')
                    ->options(User::DIVISIONS),

                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
