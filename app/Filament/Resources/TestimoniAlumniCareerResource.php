<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniAlumniCareerResource\Pages;
use App\Models\TestimoniAlumniCareer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimoniAlumniCareerResource extends Resource
{
    protected static ?string $model = TestimoniAlumniCareer::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Testimoni Alumni';

    protected static ?string $modelLabel = 'Testimoni Alumni';

    protected static ?string $pluralModelLabel = 'Testimoni Alumni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Alumni')
                    ->schema([
                        Forms\Components\FileUpload::make('testimoni_alumni_img')
                            ->label('Foto Alumni')
                            ->image()
                            ->disk('public') // TAMBAHAN: disk configuration
                            ->directory('testimoni-alumni')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                            ->maxSize(2048)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('testimoni_alumni_name')
                            ->label('Nama Alumni')
                            ->required()
                            ->maxLength(100)
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('testimoni_alumni_position')
                            ->label('Posisi/Jabatan')
                            ->required()
                            ->maxLength(100)
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('testimoni_alumni_description')
                            ->label('Testimoni/Deskripsi')
                            ->required()
                            ->maxLength(255)
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('testimoni_alumni_img')
                    ->label('Foto')
                    ->disk('public') // TAMBAHAN: disk configuration
                    ->circular()
                    ->size(60)
                    ->defaultImageUrl('/images/default-avatar.png'), // OPSIONAL: gambar default

                Tables\Columns\TextColumn::make('testimoni_alumni_name')
                    ->label('Nama Alumni')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('testimoni_alumni_position')
                    ->label('Posisi')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('testimoni_alumni_description')
                    ->label('Testimoni')
                    ->limit(50)
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListTestimoniAlumniCareers::route('/'),
            'create' => Pages\CreateTestimoniAlumniCareer::route('/create'),
            'edit' => Pages\EditTestimoniAlumniCareer::route('/{record}/edit'),
            // 'view' => Pages\ViewTestimoniAlumniCareer::route('/{record}'),
        ];
    }
}
