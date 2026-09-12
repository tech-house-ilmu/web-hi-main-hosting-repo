<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationLabel = 'Komentar';

    protected static ?string $modelLabel = 'Komentar';

    protected static ?string $pluralModelLabel = 'Komentar';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Pengirim')
                    ->required()
                    ->maxLength(100),

                TextInput::make('page_slug')
                    ->label('Halaman / Page Slug')
                    ->required()
                    ->helperText('Slug atau URL halaman tempat komentar berada'),

                Select::make('parent_id')
                    ->label('Balasan Dari')
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->placeholder('Komentar Utama (Bukan Balasan)')
                    ->helperText('Kosongkan jika ini adalah komentar utama'),

                Textarea::make('content')
                    ->label('Isi Komentar')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('content')
                    ->label('Isi Komentar')
                    ->limit(60)
                    ->searchable()
                    ->wrap(),

                TextColumn::make('page_slug')
                    ->label('Halaman')
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('parent.name')
                    ->label('Balasan Untuk')
                    ->placeholder('Komentar Utama')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('page_slug')
                    ->label('Halaman')
                    ->options(fn () => Comment::distinct()->pluck('page_slug', 'page_slug')->toArray()),

                TernaryFilter::make('is_reply')
                    ->label('Tipe')
                    ->placeholder('Semua')
                    ->trueLabel('Hanya Balasan')
                    ->falseLabel('Hanya Komentar Utama')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('parent_id'),
                        false: fn ($query) => $query->whereNull('parent_id'),
                    ),
            ])
            ->actions([
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
