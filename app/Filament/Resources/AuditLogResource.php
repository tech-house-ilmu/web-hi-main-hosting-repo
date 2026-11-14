<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditLogResource\Pages;
use App\Models\AuditLog;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AuditLogResource extends Resource
{
    protected static ?string $model = AuditLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Audit Log & Riwayat';

    protected static ?string $modelLabel = 'Audit Log';

    protected static ?string $pluralModelLabel = 'Audit Log & Riwayat Aktivitas';

    public static function canViewAny(): bool
    {
        return auth()->user()?->isSuperAdmin() ?? false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('created_at')
                    ->label('Waktu Kejadian')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d/m/Y H:i:s') : '-')
                    ->disabled(),

                TextInput::make('user_name')
                    ->label('Pelaku Tindakan')
                    ->disabled(),

                TextInput::make('division')
                    ->label('Divisi')
                    ->disabled(),

                TextInput::make('action')
                    ->label('Jenis Tindakan')
                    ->disabled(),

                TextInput::make('subject_type')
                    ->label('Tipe Objek')
                    ->disabled(),

                TextInput::make('subject_id')
                    ->label('ID Objek')
                    ->disabled(),

                TextInput::make('ip_address')
                    ->label('IP Address')
                    ->disabled(),

                Textarea::make('description')
                    ->label('Keterangan')
                    ->rows(2)
                    ->columnSpanFull()
                    ->disabled(),

                Textarea::make('properties')
                    ->label('Detail Perubahan / Alasan (JSON)')
                    ->formatStateUsing(fn ($state) => is_array($state) ? json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string) $state)
                    ->rows(6)
                    ->columnSpanFull()
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable(),

                TextColumn::make('user_name')
                    ->label('Pelaku')
                    ->searchable()
                    ->sortable()
                    ->limit(25),

                TextColumn::make('division')
                    ->label('Divisi')
                    ->badge()
                    ->color('primary')
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('action')
                    ->label('Tindakan')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        AuditLog::ACTION_CREATE => 'Create',
                        AuditLog::ACTION_UPDATE => 'Update',
                        AuditLog::ACTION_DELETE => 'Delete',
                        AuditLog::ACTION_ROLE_CHANGE => 'Role Change',
                        AuditLog::ACTION_STATUS_CHANGE => 'Status Change',
                        AuditLog::ACTION_APPROVAL => 'Approval',
                        AuditLog::ACTION_REJECTION => 'Rejection',
                        default => $state ?? '-',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        AuditLog::ACTION_CREATE, AuditLog::ACTION_APPROVAL => 'success',
                        AuditLog::ACTION_UPDATE => 'info',
                        AuditLog::ACTION_ROLE_CHANGE, AuditLog::ACTION_STATUS_CHANGE => 'warning',
                        AuditLog::ACTION_DELETE, AuditLog::ACTION_REJECTION => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('subject_type')
                    ->label('Objek')
                    ->badge()
                    ->color('gray')
                    ->placeholder('-'),

                TextColumn::make('description')
                    ->label('Keterangan Ringkas')
                    ->limit(50)
                    ->searchable()
                    ->wrap(),
            ])
            ->filters([
                SelectFilter::make('user_id')
                    ->label('Filter Akun')
                    ->options(fn () => User::query()->pluck('name', 'id')->toArray()),

                SelectFilter::make('division')
                    ->label('Filter Divisi')
                    ->options(User::DIVISIONS),

                SelectFilter::make('action')
                    ->label('Jenis Aktivitas')
                    ->options([
                        AuditLog::ACTION_CREATE => 'Create',
                        AuditLog::ACTION_UPDATE => 'Update',
                        AuditLog::ACTION_DELETE => 'Delete',
                        AuditLog::ACTION_ROLE_CHANGE => 'Perubahan Role',
                        AuditLog::ACTION_STATUS_CHANGE => 'Perubahan Status',
                        AuditLog::ACTION_APPROVAL => 'Approval (Persetujuan)',
                        AuditLog::ACTION_REJECTION => 'Rejection (Penolakan)',
                    ]),

                Filter::make('created_at')
                    ->label('Periode')
                    ->form([
                        DatePicker::make('from')->label('Dari Tanggal'),
                        DatePicker::make('until')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                ViewAction::make()->modalHeading('Detail Riwayat Aktivitas'),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListAuditLogs::route('/'),
        ];
    }
}
