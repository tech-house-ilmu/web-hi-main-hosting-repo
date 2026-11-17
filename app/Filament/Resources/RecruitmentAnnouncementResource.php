<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecruitmentAnnouncementResource\Pages;
use App\Models\RecruitmentAnnouncement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RecruitmentAnnouncementResource extends Resource
{
    protected static ?string $model = RecruitmentAnnouncement::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Pengumuman Rekrutmen';

    protected static ?string $modelLabel = 'Pengumuman Rekrutmen';

    protected static ?string $pluralModelLabel = 'Pengumuman Rekrutmen';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Pengaturan Rekrutmen')
                    ->tabs([
                        // Tab 1: Status & Card Copywriting
                        Forms\Components\Tabs\Tab::make('Status & Card Pengumuman')
                            ->icon('heroicon-o-adjustments-horizontal')
                            ->schema([
                                Forms\Components\Section::make('Status Utama Rekrutmen')
                                    ->description('Pilih status rekrutmen saat ini. Status ini akan menentukan tampilan kartu di halaman Career.')
                                    ->schema([
                                        Forms\Components\Radio::make('status')
                                            ->label('Status Rekrutmen')
                                            ->options([
                                                'dibuka' => 'Pendaftaran Dibuka',
                                                'stay_tuned' => 'Stay Tuned (Menunggu Pengumuman)',
                                                'selesai' => 'Rekrutmen Selesai (Pengumuman Hasil Seleksi)',
                                            ])
                                            ->descriptions([
                                                'dibuka' => 'Menampilkan kartu informasi pendaftaran dibuka ke publik.',
                                                'stay_tuned' => 'Menampilkan kartu informasi berkas sedang diseleksi.',
                                                'selesai' => 'Menampilkan kartu pengumuman hasil seleksi dan tombol menuju halaman pengumuman.',
                                            ])
                                            ->inline(false)
                                            ->required(),

                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\TextInput::make('batch_label')
                                                ->label('Label / Nama Batch')
                                                ->helperText('Contoh: Batch 6 Urgent Hiring – Official Announcement')
                                                ->required(),

                                            Forms\Components\TextInput::make('announcement_date')
                                                ->label('Tanggal Pengumuman')
                                                ->helperText('Contoh: Tanggal pengumuman belum tersedia atau 15 Oktober 2026')
                                                ->nullable(),
                                        ]),
                                    ]),

                                Forms\Components\Section::make('Konten Saat Status: "Pendaftaran Dibuka"')
                                    ->collapsed()
                                    ->schema([
                                        Forms\Components\TextInput::make('open_badge')
                                            ->label('Teks Badge')
                                            ->default('PENDAFTARAN DIBUKA')
                                            ->required(),
                                        Forms\Components\TextInput::make('open_title')
                                            ->label('Judul Kartu')
                                            ->required(),
                                        Forms\Components\Textarea::make('open_description')
                                            ->label('Deskripsi Kartu')
                                            ->rows(3)
                                            ->required(),
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\TextInput::make('open_button_text')
                                                ->label('Teks Tombol')
                                                ->default('Jelajahi Lowongan')
                                                ->required(),
                                            Forms\Components\TextInput::make('open_button_url')
                                                ->label('Link Tujuan Tombol')
                                                ->default('#career-info')
                                                ->required(),
                                        ]),
                                    ]),

                                Forms\Components\Section::make('Konten Saat Status: "Stay Tuned"')
                                    ->collapsed()
                                    ->schema([
                                        Forms\Components\TextInput::make('stay_tuned_badge')
                                            ->label('Teks Badge')
                                            ->default('STAY TUNED')
                                            ->required(),
                                        Forms\Components\TextInput::make('stay_tuned_title')
                                            ->label('Judul Kartu')
                                            ->required(),
                                        Forms\Components\Textarea::make('stay_tuned_description')
                                            ->label('Deskripsi Kartu')
                                            ->rows(3)
                                            ->required(),
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\TextInput::make('stay_tuned_button_text')
                                                ->label('Teks Tombol (Opsional)')
                                                ->default('Pantau Instagram')
                                                ->nullable(),
                                            Forms\Components\TextInput::make('stay_tuned_button_url')
                                                ->label('Link Tujuan Tombol (Opsional)')
                                                ->default('https://www.instagram.com/houseilmu.id')
                                                ->nullable(),
                                        ]),
                                    ]),

                                Forms\Components\Section::make('Konten Saat Status: "Rekrutmen Selesai"')
                                    ->schema([
                                        Forms\Components\TextInput::make('closed_badge')
                                            ->label('Teks Badge')
                                            ->default('REKRUTMEN SELESAI')
                                            ->required(),
                                        Forms\Components\TextInput::make('closed_title')
                                            ->label('Judul Kartu')
                                            ->required(),
                                        Forms\Components\Textarea::make('closed_description')
                                            ->label('Deskripsi Kartu')
                                            ->rows(3)
                                            ->required(),
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\TextInput::make('closed_button_text')
                                                ->label('Teks Tombol')
                                                ->default('Lihat Pengumuman')
                                                ->required(),
                                            Forms\Components\TextInput::make('closed_button_url')
                                                ->label('Link Tujuan Tombol')
                                                ->default('/career/announcement')
                                                ->required(),
                                        ]),
                                    ]),
                            ]),

                        // Tab 2: Detail Divisi & Nama-nama yang Lolos
                        Forms\Components\Tabs\Tab::make('Detail Divisi & Hasil Seleksi')
                            ->icon('heroicon-o-user-group')
                            ->schema([
                                Forms\Components\Section::make('Header & Penutup Halaman Pengumuman')
                                    ->schema([
                                        Forms\Components\TextInput::make('page_heading')
                                            ->label('Judul Selamat (Header)')
                                            ->default('Selamat kepada Kawaners yang telah lolos!')
                                            ->required(),
                                        Forms\Components\Textarea::make('page_subheading')
                                            ->label('Sub-judul Ucapan')
                                            ->rows(2)
                                            ->nullable(),
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\TextInput::make('closing_title')
                                                ->label('Judul Kotak Penutup')
                                                ->default('Terima kasih sudah berproses bersama kami')
                                                ->required(),
                                            Forms\Components\Textarea::make('closing_description')
                                                ->label('Deskripsi Kotak Penutup')
                                                ->rows(2)
                                                ->nullable(),
                                        ]),
                                    ]),

                                Forms\Components\Section::make('Daftar Divisi & Nama yang Lolos')
                                    ->description('Atur divisi mana saja yang ditampilkan di halaman pengumuman, serta tambahkan nama-nama yang lolos. Divisi yang dinonaktifkan tidak akan muncul dan tata letak akan menyesuaikan secara otomatis.')
                                    ->schema([
                                        Forms\Components\Repeater::make('divisions')
                                            ->label('Divisi')
                                            ->schema([
                                                Forms\Components\Grid::make(3)->schema([
                                                    Forms\Components\TextInput::make('name')
                                                        ->label('Nama Divisi')
                                                        ->required()
                                                        ->columnSpan(2),

                                                    Forms\Components\Toggle::make('is_active')
                                                        ->label('Tampilkan Divisi?')
                                                        ->default(true)
                                                        ->inline(false)
                                                        ->columnSpan(1),
                                                ]),

                                                Forms\Components\TextInput::make('position')
                                                    ->label('Label Posisi')
                                                    ->default('Posisi: Staf / Relawan')
                                                    ->columnSpanFull(),

                                                Forms\Components\TagsInput::make('names')
                                                    ->label('Daftar Nama yang Lolos')
                                                    ->placeholder('Ketik nama lalu tekan Enter')
                                                    ->helperText('Ketik nama satu per satu lalu tekan Enter. Jika dikosongkan, di halaman website akan otomatis tertulis "Nama Kawaners akan ditampilkan setelah pengumuman resmi."')
                                                    ->columnSpanFull(),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => ($state['name'] ?? 'Divisi') . ' — ' . (!empty($state['is_active']) ? '✅ Ditampilkan' : '❌ Disembunyikan'))
                                            ->collapsible()
                                            ->cloneable()
                                            ->reorderable()
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('batch_label')
                    ->label('Nama Batch / Pengumuman')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status Aktif')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dibuka' => 'success',
                        'stay_tuned' => 'warning',
                        'selesai' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'dibuka' => 'Pendaftaran Dibuka',
                        'stay_tuned' => 'Stay Tuned',
                        'selesai' => 'Rekrutmen Selesai',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('announcement_date')
                    ->label('Tanggal Pengumuman'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecruitmentAnnouncements::route('/'),
            'create' => Pages\CreateRecruitmentAnnouncement::route('/create'),
            'edit' => Pages\EditRecruitmentAnnouncement::route('/{record}/edit'),
        ];
    }
}

