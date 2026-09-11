@extends('layout.app')

@section('title', 'About Us | House Ilmu Indonesia')

@section('content')
    <!-- Start about title section -->
    <section class="about-title container-xl mt-5">
        <div class="about-title-container container-sm d-flex flex-column justify-content-center align-items-center text-center"
            data-aos="fade">
            <h1 class="py-4"><span style="color: #1746A2;">Better</span> <span style="color: #FF731D;">Career</span>
                <span style="color: #1746A2;">for Better</span> <span style="color: #FF731D;">Future</span></h1>
            <p>House Ilmu adalah sebuah platform yang bergerak di bidang career development dengan mengedepankan unsur
                sosial untuk memberikan impact bagi generasi muda.</p>
        </div>
    </section>
    <!-- End about title section -->

    <!-- Start about mission section -->
    <section class="mission container-xl mt-5">
        <div
            class="mission-container container-xl d-flex flex-column flex-md-row justify-content-around align-items-stretch text-light">
            <!-- Start mission box -->
            <div class="col-12 col-md-5 col-lg-4 d-flex flex-column justify-content-start align-items-center text-center p-4 my-2 my-md-0 rounded-4"
                style="background-color: #1746A2;" data-aos="fade-right">
                <h1 class="fw-bold py-3">Our Mission</h1>
                <ol class="text-light text-start">
                    <li>Memfasilitasi generasi muda untuk mengenali passion diri guna menentukan karir masa depan</li>
                    <li>Meningkatkan soft skill dan life skill generasi muda.</li>
                </ol>
            </div>
            <!-- End mission box -->
            <!-- Start vision box -->
            <div class="col-12 col-md-5 col-lg-4 d-flex flex-column justify-content-start align-items-center text-center p-4 my-2 my-md-0 rounded-4"
                style="background-color: #FF731D;" data-aos="fade-left">
                <h1 class="fw-bold py-3">Our Vision</h1>
                <p class="fw-light">Menjadi kawan bagi generasi muda untuk dalam pengembangan karir yang berfokus pada
                    soft skill dan life skill</p>
            </div>
            <!-- End vision box -->
        </div>
    </section>
    <!-- End about mission section -->

    <!-- Start about timeline section -->
    <section class="timeline container-xl mt-5">
        <div class="timeline-container container-xl d-flex flex-column justify-content-center align-items-center">
            <h1 class="py-4" style="color: #1746A2;">Timeline</h1>
            <div class="timeline-desc-container container-xl d-flex flex-row flex-md-column justify-content-start" data-aos="fade-up">
                <!-- Start timeline bullet image -->
                <div class="timeline-img d-flex justify-content-center my-0 my-md-2 mx-3 mx-md-0">
                    <img class="horizontal-img d-none d-md-block" src="{{ asset('img/homepage/about/timeline-horizontal.webp') }}" alt="timeline image">
                    <img class="vertical-img d-block d-md-none" src="{{ asset('img/homepage/about/timeline-vertical.webp') }}"
                        alt="timeline image">
                </div>
                <!-- End timeline bullet image -->
                <!-- Start timeline desc -->
                <div class="timeline-desc-box d-flex flex-column flex-md-row justify-content-around">
                    <div
                        class="timeline-desc col-12 col-md-3 col-lg-3 d-flex flex-column justify-content-start align-items-md-start mx-md-2">
                        <h2 class="my-0" style="color: #1746A2;">2021</h2>
                        <p>Educatian, <br> Environment dan Life <br> Style</p>
                    </div>
                    <div
                        class="timeline-desc col-12 col-md-3 col-lg-3 d-flex flex-column justify-content-start align-items-md-center mx-md-2">
                        <h2 class="mt-4 mt-md-0" style="color: #1746A2;">2023</h2>
                        <p class="mb-5 mb-md-0">Education dan Skill</p>
                    </div>
                    <div
                        class="timeline-desc col-12 col-md-3 col-lg-3 d-flex flex-column justify-content-start align-items-md-end mx-md-2">
                        <h2 class="mt-5 mt-md-0" style="color: #1746A2;">2025</h2>
                        <p>Career</p>
                    </div>
                </div>
                <!-- End timeline desc -->
            </div>
        </div>
    </section>
    <!-- End about timeline section -->

    <!-- Start about profile images section -->
    <section class="profiles container-xl my-5">
        <div class="profiles-container container-xl d-flex flex-column justify-content-center align-items-center">
            <h1 class="py-4 fw-bold" style="color: #1746A2;">Our Team</h1>

            <!-- Filter Navigation Tabs -->
            <div class="team-filter d-flex flex-wrap justify-content-center gap-2 mb-4">
                <button type="button" class="team-filter-btn active" data-filter="all">Semua</button>
                <button type="button" class="team-filter-btn" data-filter="leadership">Leadership</button>
                <button type="button" class="team-filter-btn" data-filter="ceo-office">CEO Office</button>
                <button type="button" class="team-filter-btn" data-filter="human-capital">Human Capital</button>
                <button type="button" class="team-filter-btn" data-filter="business-development">Business Development</button>
                <button type="button" class="team-filter-btn" data-filter="marketing">Marketing</button>
                <button type="button" class="team-filter-btn" data-filter="technology">Technology</button>
            </div>

            @php
                $leadersList = $leaders ?? $LeadersDetailsAbout ?? collect();

                $chiefList = $leadersList->filter(fn($m) => in_array($m->leaders_details_position, ['CEO', 'CEO HI', 'CTO', 'COO', 'CMO', 'CFO']));
                $vpList = $leadersList->filter(fn($m) => in_array($m->leaders_details_position, ['VP', 'Vice President']));

                $ceoOfficeList = $leadersList->filter(fn($m) => $m->leaders_details_position_division === 'CEO Office');
                $hcList = $leadersList->filter(fn($m) => $m->leaders_details_position_division === 'Human Capital');
                $bdList = $leadersList->filter(fn($m) => $m->leaders_details_position_division === 'Business Development');
                $marketingList = $leadersList->filter(fn($m) => $m->leaders_details_position_division === 'Marketing');
                $techList = $leadersList->filter(fn($m) => $m->leaders_details_position_division === 'Technology');
            @endphp

            <!-- Leadership / Board of Directors -->
            <div class="team-division-section d-flex flex-column justify-content-center align-items-center my-4 w-100" data-division="leadership">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">Chief Officer</h1>
                <div class="team-grid d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @forelse($chiefList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Chief belum ada.</p></div>
                    @endforelse
                </div>

                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white mt-5" style="background-color: #04284E; color: #FF731D !important;">Vice President</h1>
                <div class="team-grid d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @forelse($vpList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Vice President belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- CEO Office Staff -->
            <div class="team-division-section d-flex flex-column justify-content-center align-items-center my-4 w-100" data-division="ceo-office">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">CEO Office</h1>
                <div class="team-grid d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @forelse($ceoOfficeList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data CEO Office belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Human Capital -->
            <div class="team-division-section d-flex flex-column justify-content-center align-items-center my-4 w-100" data-division="human-capital">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">Divisi Human Capital</h1>
                <div class="team-grid d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @forelse($hcList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Human Capital belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Business Development -->
            <div class="team-division-section d-flex flex-column justify-content-center align-items-center my-4 w-100" data-division="business-development">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">Divisi Business Development</h1>
                <div class="team-grid d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @forelse($bdList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Business Development belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Marketing -->
            <div class="team-division-section d-flex flex-column justify-content-center align-items-center my-4 w-100" data-division="marketing">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">Divisi Marketing</h1>
                <div class="team-grid d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @forelse($marketingList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Marketing belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Technology -->
            <div class="team-division-section d-flex flex-column justify-content-center align-items-center my-4 w-100" data-division="technology">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">Divisi Technology</h1>
                <div class="team-grid d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @forelse($techList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Technology belum ada.</p></div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
    <!-- End about profile images section -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.team-filter-btn');
            const sections = document.querySelectorAll('.team-division-section');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.getAttribute('data-filter');
                    sections.forEach(sec => {
                        const division = sec.getAttribute('data-division');
                        if (filter === 'all' || division === filter) {
                            sec.style.display = 'flex';
                        } else {
                            sec.style.display = 'none';
                        }
                    });
                });
            });

            // Fetch latest employees from /api/employees
            fetch('{{ route('api.employees') }}')
                .then(response => {
                    if (!response.ok) throw new Error('Failed to fetch employees API');
                    return response.json();
                })
                .then(employees => {
                    window.houseIlmuEmployees = employees;
                })
                .catch(err => {
                    console.info('Employee API status:', err);
                });
        });
    </script>

    <style>
        /* Custom gap for better spacing */
        .chief-member, .vice-member, .team-grid {
            gap: 2.5rem !important;
            padding: 0 1rem;
        }

        /* Filter buttons */
        .team-filter-btn {
            background: #F3F4F6;
            color: #1746A2;
            border: 1px solid #E5E7EB;
            border-radius: 9999px;
            padding: 8px 22px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .team-filter-btn:hover {
            background: #E0E7FF;
            color: #1746A2;
        }

        .team-filter-btn.active {
            background: #1746A2;
            color: #FFFFFF;
            border-color: #1746A2;
            box-shadow: 0 4px 6px -1px rgba(23, 70, 162, 0.25);
        }

        /* Member Card Styles */
        .member-card {
            width: 280px;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .member-image-container {
            position: relative;
            width: 100%;
            height: 300px;
            background-color: #F3F4F6;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .member-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .member-card:hover .member-image-container img {
            transform: scale(1.05);
        }

        .member-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(23, 70, 162, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .member-card:hover .member-overlay {
            opacity: 1;
        }

        .member-social-links {
            display: flex;
            gap: 20px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            color: #1746A2;
            text-decoration: none;
            font-size: 20px;
            transition: all 0.3s ease;
            transform: translateY(20px);
        }

        .member-card:hover .social-link {
            transform: translateY(0);
        }

        .social-link:hover {
            background: #FF731D;
            color: white;
            transform: translateY(-3px) scale(1.1);
        }

        .member-info {
            padding: 22px 18px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .member-position {
            font-weight: bold;
            color: #1746A2;
            margin: 0 0 6px 0;
            font-size: 1.15rem;
            line-height: 1.3;
        }

        .member-subdivision {
            display: block;
            font-size: 0.92rem;
            font-weight: 500;
            color: #FF731D;
            margin: 0 0 8px 0;
        }

        .member-name {
            color: #374151;
            margin: 0;
            font-size: 1.05rem;
            font-weight: 600;
            line-height: 1.35;
        }

        .no-data-message {
            text-align: center;
            color: #6b7280;
            padding: 40px;
        }

        .no-data-message i {
            font-size: 48px;
            margin-bottom: 16px;
            display: block;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .member-card {
                width: 100%;
                max-width: 280px;
            }
            
            .member-image-container {
                height: 250px;
            }
            
            .social-link {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
        }

        @media (max-width: 576px) {
            .member-image-container {
                height: 220px;
            }
            
            .member-info {
                padding: 18px;
            }
            
            .member-position {
                font-size: 1.05rem;
            }
            
            .member-name {
                font-size: 0.95rem;
            }
        }
    </style>
@endsection