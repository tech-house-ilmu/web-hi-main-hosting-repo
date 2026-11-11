@extends('layout.app')

@section('title', 'Our Team | House Ilmu Indonesia')
@section('meta_description', 'Struktur organisasi dan tim House Ilmu Indonesia.')

@section('content')
<main class="team-page">
    <!-- PAGE TITLE -->
    <section class="team-banner">
        <h1>OUR TEAM</h1>
    </section>

    <!-- ORGANIZATION STRUCTURE -->
    <section class="organization-section">
        <div class="team-container">
            <div class="team-heading">
                <h2>ORGANIZATION STRUCTURE</h2>
                <span></span>
            </div>

            <div class="organization-box">
                <div class="org-tree">
                    <div class="org-chief">Chief</div>
                    <div class="org-line"></div>

                    <div class="org-vice">
                        <i class="fa-solid fa-users me-2"></i>
                        Vice President
                    </div>

                    <div class="org-line"></div>
                    <div class="org-managers">Managers</div>

                    <div class="org-branches">
                        <div class="org-column">
                            <div class="org-department">
                                <h3><i class="fa-regular fa-user"></i> Human Capital</h3>
                                <div class="org-position">Human Capital Organization</div>
                                <div class="org-position">Human Capital System</div>
                                <div class="org-position">Human Capital Talent Acquisition</div>
                            </div>
                        </div>

                        <div class="org-column">
                            <div class="org-department">
                                <h3><i class="fa-solid fa-laptop"></i> Technology</h3>
                                <div class="org-position">Web Development</div>
                            </div>
                        </div>

                        <div class="org-column">
                            <div class="org-department">
                                <h3><i class="fa-solid fa-bullhorn"></i> Marketing</h3>
                                <div class="org-position">Digital Marketing</div>
                                <div class="org-position">Event Marketing</div>
                                <div class="org-position">Copywriting</div>
                                <div class="org-position">Social Media</div>
                                <div class="org-position">Graphic Design</div>
                                <div class="org-position">Talent Management</div>
                            </div>
                        </div>

                        <div class="org-column">
                            <div class="org-department">
                                <h3><i class="fa-solid fa-cube"></i> Product Development</h3>
                                <div class="org-position">Product Development</div>
                                <div class="org-position">Education Counselor</div>
                            </div>
                        </div>

                        <div class="org-column">
                            <div class="org-department">
                                <h3><i class="fa-regular fa-building"></i> CEO Office</h3>
                                <div class="org-position">Finance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FILTER DIVISION -->
            <div class="team-filter">
                <label for="divisionFilter">Divisi</label>
                <select id="divisionFilter">
                    <option value="all">ALL DIVISIONS</option>
                    <option value="human-capital">HUMAN CAPITAL</option>
                    <option value="technology">TECHNOLOGY</option>
                    <option value="marketing">MARKETING</option>
                    <option value="product-development">PRODUCT DEVELOPMENT</option>
                    <option value="ceo-office">CEO OFFICE</option>
                </select>
            </div>
        </div>
    </section>

    @php
        $divisionsData = [
            [
                'id' => 'human-capital',
                'name' => 'HUMAN CAPITAL',
                'groups' => [
                    'Human Capital Organization',
                    'Human Capital System',
                    'Human Capital Talent Acquisition'
                ]
            ],
            [
                'id' => 'technology',
                'name' => 'TECHNOLOGY',
                'groups' => [
                    'Web Development'
                ]
            ],
            [
                'id' => 'marketing',
                'name' => 'MARKETING',
                'groups' => [
                    'Digital Marketing',
                    'Event Marketing',
                    'Creative & Social Media',
                    'Talent Management'
                ]
            ],
            [
                'id' => 'product-development',
                'name' => 'PRODUCT DEVELOPMENT',
                'groups' => [
                    'Product Development',
                    'Education Counselor'
                ]
            ],
            [
                'id' => 'ceo-office',
                'name' => 'CEO OFFICE',
                'groups' => [
                    'Finance'
                ]
            ],
        ];

        $leadersList = $leaders ?? collect();
    @endphp

    @foreach($divisionsData as $div)
        <section class="division-section" data-division="{{ $div['id'] }}">
            <h2 class="division-title">{{ $div['name'] }}</h2>

            @foreach($div['groups'] as $index => $group)
                @php
                    $members = $leadersList->filter(function($l) use ($div, $group) {
                        return strtolower($l->leaders_details_position_division ?? '') === strtolower(str_replace('-', ' ', $div['id']))
                            || strtolower($l->leaders_details_sub_division ?? '') === strtolower($group);
                    });
                @endphp

                <div class="team-group {{ $index % 2 === 1 ? 'orange' : '' }}">
                    <h3>{{ $group }}</h3>

                    <div class="carousel-wrapper">
                        <button class="carousel-btn prev-btn" aria-label="Anggota sebelumnya" type="button">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>

                        <div class="team-track">
                            @if($members->count() > 0)
                                @foreach($members as $m)
                                    <article class="team-card">
                                        <div class="member-photo">
                                            @if($m->leaders_details_img)
                                                <img src="{{ asset('storage/' . $m->leaders_details_img) }}" alt="{{ $m->leaders_details_name }}">
                                            @else
                                                <i class="fa-regular fa-image"></i>
                                                <span>FOTO</span>
                                            @endif
                                        </div>
                                        <p class="member-name">{{ $m->leaders_details_name }}</p>
                                        <p class="member-role">{{ $m->leaders_details_position }}</p>
                                        <p class="member-subdivision">{{ $m->leaders_details_sub_division ?? $group }}</p>
                                        <p class="member-division">{{ $div['name'] }}</p>
                                    </article>
                                @endforeach
                            @else
                                @for($i = 1; $i <= 4; $i++)
                                    <article class="team-card">
                                        <div class="member-photo">
                                            <i class="fa-regular fa-image"></i>
                                            <span>PLACEHOLDER</span>
                                        </div>
                                        <p class="member-name">Staff Member 0{{ $i }}</p>
                                        <p class="member-role">{{ $group }}</p>
                                        <p class="member-subdivision">{{ $group }}</p>
                                        <p class="member-division">{{ $div['name'] }}</p>
                                    </article>
                                @endfor
                            @endif
                        </div>

                        <button class="carousel-btn next-btn" aria-label="Anggota berikutnya" type="button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </section>
    @endforeach

    <!-- JOIN CTA -->
    <section class="team-cta">
        <h2>BE PART OF HOUSE ILMU</h2>
        <p>Mari belajar, terhubung, dan tumbuh bersama House Ilmu Indonesia.</p>
        <a href="{{ route('career.index') }}">Gabung Sekarang ↗</a>
    </section>

    <a href="{{ route('about') }}" class="back-about">
        <i class="fa-solid fa-arrow-left me-2"></i>
        Kembali ke About Us
    </a>
</main>
@endsection
