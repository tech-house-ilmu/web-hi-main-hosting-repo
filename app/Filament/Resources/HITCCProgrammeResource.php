<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\HITCCCategory;
use App\Models\HITCCExchange;
use App\Models\HITCCProgramme;
use App\Models\HITCCVolunteer;
use App\Models\HITCCInternship;
use App\Models\HITCCCompetition;
use App\Models\HITCCScholarship;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HITCCProgrammeResource\Pages;
use App\Filament\Resources\HITCCProgrammeResource\RelationManagers;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Infolist;

use function Laravel\Prompts\textarea;

class HITCCProgrammeResource extends Resource
{
    protected static ?string $model = HITCCProgramme::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'HITCC';
    protected static ?string $pluralLabel = 'House Ilmu The Career Clubs';
    protected static ?string $modelLabel = 'Program';
    protected static ?string $slug = 'hitcc-programmes';



    public static function form(Form $form): Form
    {
        $internshipId   = HITCCCategory::where('slug', 'internship')->first()?->id;
        $volunteerId    = HITCCCategory::where('slug', 'volunteer')->first()?->id;
        $scholarshipId  = HITCCCategory::where('slug', 'scholarship')->first()?->id;
        $exchangeId     = HITCCCategory::where('slug', 'exchange')->first()?->id;
        $competitionId  = HITCCCategory::where('slug', 'competition')->first()?->id;

        return $form
            ->schema([
                Section::make('Data Umum')->schema([ // PERBAIKAN: ->schema([ bukan ] [
                    Grid::make(2)
                        ->schema([
                            Select::make('hitcc_category_id')
                                ->label('Kategori')
                                ->options(HITCCCategory::pluck('name', 'id'))
                                ->required()
                                ->reactive(),
                            TextInput::make('title_program')->label('Judul Program')->required(),
                            TextInput::make('link_apply')->label('Link Apply'),
                            TextInput::make('slug')
                                ->label('Custom Url/Slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                            FileUpload::make('logo_company_img')
                                ->label('Logo Perusahaan/Organizer')
                                ->directory(fn($get) => match($get('hitcc_category_id')) {
                                    $internshipId => 'HITCCInternship',
                                    $volunteerId => 'HITCCVolunteer',
                                    $scholarshipId => 'HITCCScholarship',
                                    $exchangeId => 'HITCCExchange',
                                    $competitionId => 'HITCCCompetition',
                                    default => 'HITCCOthers',
                                })
                                ->image()
                                ->visibility('public')
                                ->disk('public')
                                ->maxSize(4096)
                                ->imagePreviewHeight('300')
                                ->preserveFilenames()
                                ->acceptedFileTypes(['image/jpeg','image/png','image/jpg']),
                            FileUpload::make('bg_poster_img')
                                ->label('Banner / Poster Program')
                                ->directory(fn($get) => match($get('hitcc_category_id')) {
                                    $internshipId => 'HITCCInternship',
                                    $volunteerId => 'HITCCVolunteer',
                                    $scholarshipId => 'HITCCScholarship',
                                    $exchangeId => 'HITCCExchange',
                                    $competitionId => 'HITCCCompetition',
                                    default => 'HITCCOthers',
                                })
                                ->image()
                                ->visibility('public')
                                ->disk('public')
                                ->maxSize(4096)
                                ->imagePreviewHeight('300')
                                ->preserveFilenames()
                                ->acceptedFileTypes(['image/jpeg','image/png','image/jpg']),
                                
                            RichEditor::make('registration_info')->label('Informasi Registrasi'),
                            DatePicker::make('registration_deadline')->label('Deadline'),
                            TextInput::make('company_name')->label('Nama Perusahaan/Organizer')->required(),
                            Textarea::make('company_desc')->label('Deskripsi Perusahaan/Organizer'),
                            TextInput::make('company_number')->label('No Telp Perusahaan/Organizer'),
                            TextInput::make('company_email')->label('Email Perusahaan/Organizer'),
                            TextInput::make('company_website')->label('Website Perusahaan/Organizer'),
                            TextInput::make('company_social_media')->label('Social Media Perusahaan/Organizer'),
                        ]),
                ]), // TUTUP Section Data Umum

                // ROW 3: Field spesifik per kategori
                Section::make('Field Spesifik Kategori')->schema([
                    Grid::make(2)
                        ->reactive()
                        ->schema([
                            Section::make('Information')
                                ->schema([
                                TextInput::make('hitcc_internship_location')
                                    ->label('Lokasi'),
                                TextInput::make('hitcc_internship_duration')
                                    ->label('Durasi'),
                                TextInput::make('hitcc_internship_allowance')
                                    ->label('Gaji/Tidak digaji'),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $internshipId),

                            Section::make('Jobdesc')
                                ->schema([
                                RichEditor::make('hitcc_internship_jobdesc_detail')
                                    ->label('Deskripsi Pekerjaan')
                                    ->columnSpan(2),
                                TextInput::make('hitcc_internship_position')
                                    ->label('Posisi'),
                                TextInput::make('hitcc_internship_salary')
                                    ->label('Gaji'),
                                Textarea::make('hitcc_internship_benefit')
                                    ->label('Benefit')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $internshipId),

                            Section::make('Qualification')
                                ->schema([
                                TextInput::make('hitcc_internship_education')
                                    ->label('Pendidikan'),
                                TextInput::make('hitcc_internship_major')
                                    ->label('Jurusan'),
                                TextInput::make('hitcc_internship_gpa')
                                    ->label('IPK'),
                                TextInput::make('hitcc_internship_language')
                                    ->label('Bahasa'),
                                RichEditor::make('hitcc_internship_technical_non_technical_skills')
                                    ->label('Skill Teknis Non Teknis')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $internshipId),

                            Section::make('Registration')
                                ->schema([
                                TextInput::make('hitcc_internship_contact')
                                    ->label('Kontak'),
                                RichEditor::make('hitcc_internship_documents')
                                    ->label('Dokumen'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $internshipId),

                            Section::make('Additional Info')
                                ->schema([
                                TextInput::make('hitcc_internship_work_hours')
                                    ->label('Jam Kerja'),
                                RichEditor::make('hitcc_internship_facilities')
                                    ->label('Fasilitas'),
                                RichEditor::make('hitcc_internship_rules')
                                    ->label('Aturan'),
                                RichEditor::make('hitcc_internship_detail_information')
                                    ->label('Informasi Detail'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $internshipId),

                            // Volunteer
                            Section::make('Information')
                                ->schema([
                                RichEditor::make('hitcc_volunteer_program_goals')
                                    ->label('Tujuan Program')
                                    ->columnSpan(2),
                                TextInput::make('hitcc_volunteer_location')
                                    ->label('Lokasi'),
                                TextInput::make('hitcc_volunteer_type')
                                    ->label('Tipe')
                                    ->placeholder('Fully/Partial/Self Funded'),
                                TextInput::make('hitcc_volunteer_volunteer_type')
                                    ->label('Volunteer Tipe')
                                    ->placeholder('Volunteer Konservasi/Pengajaran/Lainnya'),
                                TextInput::make('hitcc_volunteer_duration')
                                    ->label('Durasi'),
                                RichEditor::make('hitcc_volunteer_benefit')
                                    ->label('Benefit')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $volunteerId),

                            Section::make('Jobdesc')
                                ->schema([
                                RichEditor::make('hitcc_volunteer_activities')
                                    ->label('Aktivitas'),
                                RichEditor::make('hitcc_volunteer_schedule_times')
                                    ->label('Jadwal'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $volunteerId),

                            Section::make('Qualification')
                                ->schema([
                                RichEditor::make('hitcc_volunteer_qualification_list')
                                    ->label('Kualifikasi'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $volunteerId),

                            Section::make('Registration')
                                ->schema([
                                RichEditor::make('hitcc_volunteer_additional_link')
                                    ->label('Link Tambahan'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $volunteerId),

                            Section::make('Additional Info')
                                ->schema([
                                RichEditor::make('hitcc_volunteer_facilities')
                                    ->label('Fasilitas'),
                                RichEditor::make('hitcc_volunteer_rules')
                                    ->label('Aturan'),
                                RichEditor::make('hitcc_volunteer_detail_information')
                                    ->label('Informasi Detail'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $volunteerId),

                            // Scholarship 
                            Section::make('Information')
                                ->schema([
                                RichEditor::make('hitcc_scholarship_program_desc')
                                    ->label('Deskripsi Program')
                                    ->columnSpan(2),
                                TextInput::make('hitcc_scholarship_scholar_type')
                                    ->label('Tipe Beasiswa')
                                    ->placeholder('Fully/Partial/Self Funded'),
                                TextInput::make('hitcc_scholarship_deadline')
                                    ->label('Deadline'),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $scholarshipId),

                            Section::make('Requirements')
                                ->schema([
                                RichEditor::make('hitcc_scholarship_requirements_scholar')
                                    ->label('Persyaratan'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $scholarshipId),

                            Section::make('Benefit')
                                ->schema([
                                RichEditor::make('hitcc_scholarship_benefit_scholar')
                                    ->label('Benefit'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $scholarshipId),

                            Section::make('Registration')
                                ->schema([
                                RichEditor::make('hitcc_scholarship_documents')
                                    ->label('Dokumen'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $scholarshipId),

                            Section::make('Additional Info')
                                ->schema([
                                TextInput::make('hitcc_scholarship_commitment_fee')
                                    ->label('Biaya Komitmen'),
                                RichEditor::make('hitcc_scholarship_company_details')
                                    ->label('Detail Perusahaan/Organizer'),
                                RichEditor::make('hitcc_scholarship_costs_covered')
                                    ->label('Biaya yang ditanggung'),
                                RichEditor::make('hitcc_scholarship_selection_phase')
                                    ->label('Fase Seleksi'),
                                RichEditor::make('hitcc_scholarship_guidebook')
                                    ->label('Guidebook'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $scholarshipId),

                            // Exchange
                            Section::make('Information')
                                ->schema([
                                RichEditor::make('hitcc_exchange_program_desc')
                                    ->label('Deskripsi Program')
                                    ->columnSpan(2),
                                TextInput::make('hitcc_exchange_location')
                                    ->label('Lokasi'),
                                TextInput::make('hitcc_exchange_duration')
                                    ->label('Durasi'),
                                TextInput::make('hitcc_exchange_type')
                                    ->label('Tipe')
                                    ->placeholder('Fully/Partial/Self Funded'),
                                TextInput::make('hitcc_exchange_exchange_type')
                                    ->label('Exchange Tipe')
                                    ->placeholder('Fellowship/Course/Delegate'),
                                RichEditor::make('hitcc_exchange_benefit')
                                    ->label('Benefit')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $exchangeId),

                            Section::make('Requirements')
                                ->schema([
                                TextInput::make('hitcc_exchange_minimal_education')
                                    ->label('Pendidikan Minimal'),
                                TextInput::make('hitcc_exchange_max_age')
                                    ->label('Usia Maksimal'),
                                TextInput::make('hitcc_exchange_gpa')
                                    ->label('IPK'),
                                Textarea::make('hitcc_exchange_relevant_experience')
                                    ->label('Pengalaman Relevan'),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $exchangeId),

                            Section::make('Selection Criteria')
                                ->schema([
                                RichEditor::make('hitcc_exchange_selection_criteria')
                                    ->label('Kriteria Seleksi'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $exchangeId),

                            Section::make('Registration')
                                ->schema([
                                RichEditor::make('hitcc_exchange_documents')
                                    ->label('Dokumen'),
                                TextInput::make('hitcc_exchange_registration_fee')
                                    ->label('Biaya Pendaftaran'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $exchangeId),

                            Section::make('Additional Info')
                                ->schema([
                                RichEditor::make('hitcc_exchange_facilities')
                                    ->label('Fasilitas'),
                                RichEditor::make('hitcc_exchange_accomodation')
                                    ->label('Akomodasi'),
                                RichEditor::make('hitcc_exchange_rules')
                                    ->label('Aturan'),
                                RichEditor::make('hitcc_exchange_detail_information')
                                    ->label('Informasi Detail'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $exchangeId),

                            // Competition
                            Section::make('Information')
                                ->schema([
                                RichEditor::make('hitcc_competition_program_goals')
                                    ->label('Tujuan Program')
                                    ->columnSpan(2),
                                TextInput::make('hitcc_competition_category')
                                    ->label('Kategori')
                                    ->placeholder('Pelajar SMK/SMA/Mahasiswa/Umum'),
                                TextInput::make('hitcc_competition_competition_type')
                                    ->label('Tipe Lomba')
                                    ->placeholder('Lomba Akademik/Non Akademik'),
                                RichEditor::make('hitcc_competition_prize')
                                    ->label('Hadiah')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $competitionId),

                            Section::make('Requirements')
                                ->schema([
                                TextInput::make('hitcc_competition_max_age')
                                    ->label('Usia Maksimal'),
                                TextInput::make('hitcc_competition_minimal_education')
                                    ->label('Pendidikan Minimal'),
                                RichEditor::make('hitcc_competition_other_requirements')
                                    ->label('Persyaratan Lain')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $competitionId),

                            Section::make('Registration and Timeline')
                                ->schema([
                                TextInput::make('hitcc_competition_fee_type')
                                    ->label('Biaya Pendaftaran Lomba'),
                                TextInput::make('hitcc_competition_venue')
                                    ->label('Tempat Pelaksanaan'),
                                Textarea::make('hitcc_competition_announcement')
                                    ->label('Pengumuman'),
                                RichEditor::make('hitcc_competition_timeline')
                                    ->label('Timeline Pelaksanaan')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->visible(fn($get) => $get('hitcc_category_id') == $competitionId),

                            Section::make('Additional Info')
                                ->schema([
                                TextInput::make('hitcc_competition_jury')
                                    ->label('Penjurian'),
                                RichEditor::make('hitcc_competition_rules')
                                    ->label('Aturan'),
                                RichEditor::make('hitcc_competition_terms_condition')
                                    ->label('Syarat dan Ketentuan'),
                            ])
                            ->visible(fn($get) => $get('hitcc_category_id') == $competitionId),
                        ]),
                ]), // TUTUP Section Field Spesifik
            ]); // TUTUP schema utama
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')->label('Kategori')->sortable()->searchable(),
                TextColumn::make('title_program')->label('Judul Program')->sortable()->searchable(),
                TextColumn::make('registration_deadline')->label('Deadline')->date()->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d/m/Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->reorderable('sort_order')
            ->filters([
                    Tables\Filters\SelectFilter::make('hitcc_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),

                Tables\Filters\TernaryFilter::make('deadline_status')
                    ->label('Status Deadline')
                    ->placeholder('Semua')
                    ->trueLabel('Masih Aktif')
                    ->falseLabel('Sudah Lewat')
                    ->queries(
                        true: fn (Builder $query) =>
                            $query->whereDate('registration_deadline', '>=', now()),
                        false: fn (Builder $query) =>
                            $query->whereDate('registration_deadline', '<', now()),
                    ),
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

    // Di dalam class HITCCProgrammeResource
    public static function getInternshipId(): ?int
    {
        return HITCCCategory::where('slug', 'internship')->first()?->id;
    }

    public static function getVolunteerId(): ?int
    {
        return HITCCCategory::where('slug', 'volunteer')->first()?->id;
    }

    public static function getScholarshipId(): ?int
    {
        return HITCCCategory::where('slug', 'scholarship')->first()?->id;
    }

    public static function getExchangeId(): ?int
    {
        return HITCCCategory::where('slug', 'exchange')->first()?->id;
    }

    public static function getCompetitionId(): ?int
    {
        return HITCCCategory::where('slug', 'competition')->first()?->id;
    }

    protected static function booted()
    {
        static::creating(function ($programme) {
            if (empty($programme->slug)) {
                $programme->slug = Str::slug($programme->title_program);
            }
        });
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
            'index' => Pages\ListHITCCProgrammes::route('/'),
            'create' => Pages\CreateHITCCProgramme::route('/create'),
            'edit' => Pages\EditHITCCProgramme::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
{
    $internshipId = self::getInternshipId();
    $volunteerId = self::getVolunteerId();
    $scholarshipId = self::getScholarshipId();
    $exchangeId = self::getExchangeId();
    $competitionId = self::getCompetitionId();

    return $infolist
        ->schema([
            // FIELD UMUM
            InfoListSection::make('Informasi Umum')
                ->schema([
                    TextEntry::make('title_program')->label('Judul Program'),
                    TextEntry::make('company_name')->label('Nama Perusahaan'),
                    ImageEntry::make('logo_company_img')->label('Logo Perusahaan'),
                    ImageEntry::make('bg_poster_img')->label('Poster'),
                    TextEntry::make('link_apply')->label('Link Pendaftaran'),
                    TextEntry::make('registration_info')->label('Info Pendaftaran')->html(),
                    TextEntry::make('registration_deadline')->label('Deadline')->date(),
                    TextEntry::make('company_desc')->label('Deskripsi Perusahaan')->html(),
                    TextEntry::make('company_number')->label('Telepon'),
                    TextEntry::make('company_email')->label('Email'),
                    TextEntry::make('company_website')->label('Website'),
                    TextEntry::make('company_social_media')->label('Media Sosial'),
                ])->columns(2),

            // FIELD SPECIFIC INTERNSHIP
            InfoListSection::make('Informasi Internship')
                ->hidden(fn($record) => $record->hitcc_category_id !== $internshipId)
                ->schema([
                    TextEntry::make('internship.hitcc_internship_location')->label('Lokasi'),
                    TextEntry::make('internship.hitcc_internship_duration')->label('Durasi'),
                    TextEntry::make('internship.hitcc_internship_allowance')->label('Tunjangan'),
                    TextEntry::make('internship.hitcc_internship_jobdesc_detail')->label('Deskripsi Pekerjaan')->html(),
                    TextEntry::make('internship.hitcc_internship_position')->label('Posisi'),
                    TextEntry::make('internship.hitcc_internship_salary')->label('Gaji'),
                    TextEntry::make('internship.hitcc_internship_benefit')->label('Benefit')->html(),
                    TextEntry::make('internship.hitcc_internship_education')->label('Pendidikan'),
                    TextEntry::make('internship.hitcc_internship_major')->label('Jurusan'),
                    TextEntry::make('internship.hitcc_internship_gpa')->label('GPA'),
                    TextEntry::make('internship.hitcc_internship_language')->label('Bahasa'),
                    TextEntry::make('internship.hitcc_internship_technical_non_technical_skills')->label('Skills')->html(),
                    TextEntry::make('internship.hitcc_internship_documents')->label('Dokumen')->html(),
                    TextEntry::make('internship.hitcc_internship_contact')->label('Kontak'),
                    TextEntry::make('internship.hitcc_internship_facilities')->label('Fasilitas')->html(),
                    TextEntry::make('internship.hitcc_internship_work_hours')->label('Jam Kerja'),
                    TextEntry::make('internship.hitcc_internship_rules')->label('Aturan')->html(),
                    TextEntry::make('internship.hitcc_internship_detail_information')->label('Informasi Detail')->html(),
                ])->columns(2),

            // FIELD SPECIFIC VOLUNTEER
            InfoListSection::make('Informasi Volunteer')
                ->hidden(fn($record) => $record->hitcc_category_id !== $volunteerId)
                ->schema([
                    TextEntry::make('volunteer.hitcc_volunteer_type')->label('Tipe'),
                    TextEntry::make('volunteer.hitcc_volunteer_volunteer_type')->label('Tipe Volunteer'),
                    TextEntry::make('volunteer.hitcc_volunteer_location')->label('Lokasi'),
                    TextEntry::make('volunteer.hitcc_volunteer_duration')->label('Durasi'),
                    TextEntry::make('volunteer.hitcc_volunteer_program_goals')->label('Tujuan Program')->html(),
                    TextEntry::make('volunteer.hitcc_volunteer_benefit')->label('Benefit')->html(),
                    TextEntry::make('volunteer.hitcc_volunteer_activities')->label('Aktivitas')->html(),
                    TextEntry::make('volunteer.hitcc_volunteer_schedule_times')->label('Jadwal'),
                    TextEntry::make('volunteer.hitcc_volunteer_qualification_list')->label('Kualifikasi')->html(),
                    TextEntry::make('volunteer.hitcc_volunteer_additional_link')->label('Link Tambahan')->html(),
                    TextEntry::make('volunteer.hitcc_volunteer_facilities')->label('Fasilitas')->html(),
                    TextEntry::make('volunteer.hitcc_volunteer_rules')->label('Aturan')->html(),
                    TextEntry::make('volunteer.hitcc_volunteer_detail_information')->label('Informasi Detail')->html(),
                ])->columns(2),

            // FIELD SPECIFIC SCHOLARSHIP
            InfoListSection::make('Informasi Scholarship')
                ->hidden(fn($record) => $record->hitcc_category_id !== $scholarshipId)
                ->schema([
                    TextEntry::make('scholarship.hitcc_scholarship_program_desc')->label('Deskripsi Program'),
                    TextEntry::make('scholarship.hitcc_scholarship_scholar_type')->label('Tipe Beasiswa'),
                    TextEntry::make('scholarship.hitcc_scholarship_deadline')->label('Deadline'),
                    TextEntry::make('scholarship.hitcc_scholarship_requirements_scholar')->label('Persyaratan')->html(),
                    TextEntry::make('scholarship.hitcc_scholarship_benefit_scholar')->label('Benefit')->html(),
                    TextEntry::make('scholarship.hitcc_scholarship_documents')->label('Dokumen')->html(),
                    TextEntry::make('scholarship.hitcc_scholarship_company_details')->label('Detail Perusahaan')->html(),
                    TextEntry::make('scholarship.hitcc_scholarship_commitment_fee')->label('Biaya Komitmen'),
                    TextEntry::make('scholarship.hitcc_scholarship_costs_covered')->label('Biaya Yang Dicover')->html(),
                    TextEntry::make('scholarship.hitcc_scholarship_selection_phase')->label('Tahap Seleksi')->html(),
                    TextEntry::make('scholarship.hitcc_scholarship_guidebook')->label('Panduan')->html(),
                ])->columns(2),

            // FIELD SPECIFIC EXCHANGE
            InfoListSection::make('Informasi Exchange')
                ->hidden(fn($record) => $record->hitcc_category_id !== $exchangeId)
                ->schema([
                    TextEntry::make('exchange.hitcc_exchange_program_desc')->label('Deskripsi Program')->html(),
                    TextEntry::make('exchange.hitcc_exchange_location')->label('Lokasi'),
                    TextEntry::make('exchange.hitcc_exchange_duration')->label('Durasi'),
                    TextEntry::make('exchange.hitcc_exchange_type')->label('Tipe'),
                    TextEntry::make('exchange.hitcc_exchange_exchange_type')->label('Tipe Exchange'),
                    TextEntry::make('exchange.hitcc_exchange_benefit')->label('Benefit')->html(),
                    TextEntry::make('exchange.hitcc_exchange_minimal_education')->label('Pendidikan Minimal'),
                    TextEntry::make('exchange.hitcc_exchange_max_age')->label('Usia Maksimal'),
                    TextEntry::make('exchange.hitcc_exchange_gpa')->label('GPA'),
                    TextEntry::make('exchange.hitcc_exchange_relevant_experience')->label('Pengalaman Relevan')->html(),
                    TextEntry::make('exchange.hitcc_exchange_selection_criteria')->label('Kriteria Seleksi')->html(),
                    TextEntry::make('exchange.hitcc_exchange_documents')->label('Dokumen')->html(),
                    TextEntry::make('exchange.hitcc_exchange_registration_fee')->label('Biaya Pendaftaran'),
                    TextEntry::make('exchange.hitcc_exchange_facilities')->label('Fasilitas')->html(),
                    TextEntry::make('exchange.hitcc_exchange_accomodation')->label('Akomodasi')->html(),
                    TextEntry::make('exchange.hitcc_exchange_rules')->label('Aturan')->html(),
                    TextEntry::make('exchange.hitcc_exchange_detail_information')->label('Informasi Detail')->html(),
                ])->columns(2),

            // FIELD SPECIFIC COMPETITION
            InfoListSection::make('Informasi Competition')
                ->hidden(fn($record) => $record->hitcc_category_id !== $competitionId)
                ->schema([
                    TextEntry::make('competition.hitcc_competition_program_goals')->label('Tujuan Program')->html(),
                    TextEntry::make('competition.hitcc_competition_category')->label('Kategori'),
                    TextEntry::make('competition.hitcc_competition_competition_type')->label('Tipe Kompetisi'),
                    TextEntry::make('competition.hitcc_competition_prize')->label('Hadiah')->html(),
                    TextEntry::make('competition.hitcc_competition_max_age')->label('Usia Maksimal')->html(),
                    TextEntry::make('competition.hitcc_competition_minimal_education')->label('Pendidikan Minimal')->html(),
                    TextEntry::make('competition.hitcc_competition_other_requirements')->label('Persyaratan Lain')->html(),
                    TextEntry::make('competition.hitcc_competition_fee_type')->label('Tipe Biaya'),
                    TextEntry::make('competition.hitcc_competition_venue')->label('Tempat'),
                    TextEntry::make('competition.hitcc_competition_timeline')->label('Timeline')->html(),
                    TextEntry::make('competition.hitcc_competition_announcement')->label('Pengumuman'),
                    TextEntry::make('competition.hitcc_competition_rules')->label('Aturan')->html(),
                    TextEntry::make('competition.hitcc_competition_jury')->label('Juri'),
                    TextEntry::make('competition.hitcc_competition_terms_condition')->label('Syarat & Ketentuan')->html(),
                ])->columns(2),
        ]);
}
}

