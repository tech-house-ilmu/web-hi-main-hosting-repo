@extends('layout.app')

@section('title', 'About Us | House Ilmu Indonesia')

@section('content')
    <!-- Start about title section -->
    <section class="about-title max-w-7xl mx-auto px-4 mt-5">
        <div class="about-title-container max-w-2xl mx-auto flex flex-col justify-center items-center text-center"
            data-aos="fade">
            <h1 class="py-4 text-3xl font-bold"><span style="color: #1746A2;">Better</span> <span style="color: #FF731D;">Career</span>
                <span style="color: #1746A2;">for Better</span> <span style="color: #FF731D;">Future</span></h1>
            <p>House Ilmu Indonesia itu rumah bagi generasi muda yang haus akan ilmu, tempat mereka bertumbuh, menemukan arah, dan mempersiapkan masa depannya. Melalui edukasi yang relevan dan perjalanan karier yang bermakna.
House Ilmu hadir sebagai teman yang menemani setiap proses belajar dan berkembang, karena kami percaya bahwa setiap anak muda berhak memiliki kesempatan untuk membangun masa depan yang lebih baik dan memberikan dampak bagi sekitarnya.
</p>
        </div>
    </section>
    <!-- End about title section -->

    <!-- Start about mission section -->
    <section class="mission max-w-7xl mx-auto px-4 mt-5">
        <div
            class="mission-container max-w-7xl mx-auto flex flex-col md:flex-row justify-around items-stretch text-white gap-4">
            <!-- Start mission box -->
            <div class="w-full md:w-5/12 lg:w-1/3 flex flex-col justify-start items-center text-center p-4 my-2 md:my-0 rounded-2xl"
                style="background-color: #1746A2;" data-aos="fade-right">
                <h1 class="font-bold text-2xl py-3">Our Vision</h1>
                <p class="font-light">Menjadi kawan bagi generasi muda untuk dalam pengembangan karir yang berfokus pada
                    soft skill dan life skill</p>
            </div>
            <!-- End mission box -->
            <!-- Start vision box -->
            <div class="w-full md:w-5/12 lg:w-1/3 flex flex-col justify-start items-center text-center p-4 my-2 md:my-0 rounded-2xl"
                style="background-color: #FF731D;" data-aos="fade-left">
                <h1 class="font-bold text-2xl py-3">Our Mission</h1>

                <ol class="text-white text-left list-decimal list-inside space-y-1">
                    <li>Memfasilitasi generasi muda untuk mengenali passion diri guna menentukan karir masa depan</li>
                    <li>Meningkatkan soft skill dan life skill generasi muda.</li>
                </ol>
            </div>
            <!-- End vision box -->
        </div>
    </section>
    <!-- End about mission section -->

    <!-- Start about timeline section -->
    <section class="timeline max-w-7xl mx-auto px-4 mt-5">
        <div class="timeline-container max-w-7xl mx-auto flex flex-col justify-center items-center">
            <h1 class="py-4 text-3xl font-bold" style="color: #1746A2;">Timeline</h1>
            <div class="timeline-desc-container max-w-7xl mx-auto flex flex-row md:flex-col justify-start" data-aos="fade-up">
                <!-- Start timeline bullet image -->
                <div class="timeline-img flex justify-center my-0 md:my-2 mx-3 md:mx-0">
                    <img class="horizontal-img hidden md:block" src="{{ asset('img/homepage/about/timeline-horizontal.webp') }}" alt="timeline image">
                    <img class="vertical-img block md:hidden" src="{{ asset('img/homepage/about/timeline-vertical.webp') }}"
                        alt="timeline image">
                </div>
                <!-- End timeline bullet image -->
                <!-- Start timeline desc -->
                <div class="timeline-desc-box flex flex-col md:flex-row justify-around w-full">
                    <div
                        class="timeline-desc w-full md:w-1/3 flex flex-col justify-start md:items-start mx-md-2">
                        <h2 class="my-0 text-xl font-bold" style="color: #1746A2;">2021</h2>
                        <p>Educatian, <br> Environment dan Life <br> Style</p>
                    </div>
                    <div
                        class="timeline-desc w-full md:w-1/3 flex flex-col justify-start md:items-center mx-md-2">
                        <h2 class="mt-4 md:mt-0 text-xl font-bold" style="color: #1746A2;">2023</h2>
                        <p class="mb-5 md:mb-0">Education dan Skill</p>
                    </div>
                    <div
                        class="timeline-desc w-full md:w-1/3 flex flex-col justify-start md:items-end mx-md-2">
                        <h2 class="mt-5 md:mt-0 text-xl font-bold" style="color: #1746A2;">2025</h2>
                        <p>Career</p>
                    </div>
                </div>
                <!-- End timeline desc -->
            </div>
        </div>
    </section>
    <!-- End about timeline section -->

    <!-- Start about culture & value section -->
    <section class="culture-value max-w-7xl mx-auto px-4 my-5">
        <div class="culture-value-container max-w-7xl mx-auto flex flex-col items-center">
            <h1 class="py-4 text-center text-3xl font-bold" style="color: #1746A2;">Culture &amp; Value</h1>

            <!-- Values: Core Value & Our Value -->
            <div class="row g-4 w-full justify-center mb-4" data-aos="fade-up">
                <div class="w-full md:w-1/2 lg:w-5/12 px-2">
                    <div class="culture-card h-full p-4 md:p-5 rounded-2xl text-center flex flex-col justify-center items-center">
                        <h2 class="mb-3 text-xl font-bold" style="color: #1746A2;">Core Value</h2>
                        <p class="culture-text mb-0" style="color: #FF731D;">Edusociopreneur</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-5/12 px-2">
                    <div class="culture-card h-full p-4 md:p-5 rounded-2xl text-center flex flex-col justify-center items-center">
                        <h2 class="mb-3 text-xl font-bold" style="color: #1746A2;">Our Value</h2>
                        <p class="culture-text mb-0" style="color: #FF731D;">Learn, Grow, and Get Achievement Together</p>
                    </div>
                </div>
            </div>

            <!-- Culture: DEALS -->
            <div class="w-full mt-3" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h2 class="font-black text-2xl md:text-3xl" style="color: #1746A2;">Culture: <span style="color: #FF731D;">DEALS</span></h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 md:gap-4 justify-center w-full mx-auto">
                    <div>
                        <div class="deal-item-card h-full p-4 rounded-2xl text-center flex flex-col items-center justify-center">
                            <h3 class="deal-letter mb-1" style="color: #FF731D;">D</h3>
                            <p class="deal-text mb-0" style="color: #1746A2;">Discipline</p>
                        </div>
                    </div>
                    <div>
                        <div class="deal-item-card h-full p-4 rounded-2xl text-center flex flex-col items-center justify-center">
                            <h3 class="deal-letter mb-1" style="color: #FF731D;">E</h3>
                            <p class="deal-text mb-0" style="color: #1746A2;">Entrepreneur</p>
                        </div>
                    </div>
                    <div>
                        <div class="deal-item-card h-full p-4 rounded-2xl text-center flex flex-col items-center justify-center">
                            <h3 class="deal-letter mb-1" style="color: #FF731D;">A</h3>
                            <p class="deal-text mb-0" style="color: #1746A2;">Agile</p>
                        </div>
                    </div>
                    <div>
                        <div class="deal-item-card h-full p-4 rounded-2xl text-center flex flex-col items-center justify-center">
                            <h3 class="deal-letter mb-1" style="color: #FF731D;">L</h3>
                            <p class="deal-text mb-0" style="color: #1746A2;">Learning</p>
                        </div>
                    </div>
                    <div>
                        <div class="deal-item-card h-full p-4 rounded-2xl text-center flex flex-col items-center justify-center">
                            <h3 class="deal-letter mb-1" style="color: #FF731D;">S</h3>
                            <p class="deal-text mb-0" style="color: #1746A2;">Social</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about culture & value section -->

    <!-- Start about our programs section -->
    <section class="programs max-w-7xl mx-auto px-4 my-12">
        <div class="programs-container max-w-7xl mx-auto flex flex-col items-center">
            <h1 class="py-4 text-center text-3xl md:text-4xl font-black" style="color: #1746A2;">Our Programs</h1>
            <div
                class="programs-box-container max-w-7xl w-full flex flex-col md:flex-row justify-around items-stretch text-white gap-6">
                <!-- Start Review CV box -->
                <div class="w-full md:w-5/12 lg:w-4/12 flex flex-col justify-start items-center text-center p-6 rounded-2xl"
                    style="background-color: #1746A2;" data-aos="fade-right">
                    <h2 class="font-bold py-3 text-white text-2xl">Review CV</h2>
                    <p class="font-light text-white mb-0">Hybrid event yang membahas tentang career preparation secara menyeluruh dari tiap tahapan recruitment.</p>
                </div>
                <!-- End Review CV box -->
                <!-- Start Sudut Karir box -->
                <div class="w-full md:w-5/12 lg:w-4/12 flex flex-col justify-start items-center text-center p-6 rounded-2xl"
                    style="background-color: #FF731D;" data-aos="fade-left">
                    <h2 class="font-bold py-3 text-white text-2xl">Sudut Karir</h2>
                    <p class="font-light text-white mb-0">Program diskusi santai untuk mengembangkan soft skill dan life skill bersama expert.</p>
                </div>
                <!-- End Sudut Karir box -->
            </div>
        </div>
    </section>
    <!-- End about our programs section -->

    <!-- Start about profile images section -->
    <section class="profiles max-w-7xl mx-auto px-4 my-12">
        <div class="profiles-container max-w-7xl mx-auto flex flex-col justify-center items-center">
            <h1 class="py-4 font-bold text-3xl md:text-4xl" style="color: #1746A2;">Our Team</h1>
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
            <div class="team-division-section flex flex-col justify-center items-center my-4 w-full" data-division="leadership">
                <h1 class="py-4 my-4 w-full text-center rounded-2xl text-white text-2xl font-bold" style="background-color: #04284E; color: #FF731D !important;">Founder</h1>
                <div class="team-grid flex flex-wrap justify-center items-stretch gap-6">
                    @forelse($chiefList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Chief belum ada.</p></div>
                    @endforelse
                </div>

                <h1 class="py-4 my-4 w-full text-center rounded-2xl text-white mt-8 text-2xl font-bold" style="background-color: #04284E; color: #FF731D !important;">Vice President</h1>
                <div class="team-grid flex flex-wrap justify-center items-stretch gap-6">
                    @forelse($vpList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Vice President belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- CEO Office Staff -->
            <div class="team-division-section flex flex-col justify-center items-center my-4 w-full" data-division="ceo-office">
                <h1 class="py-4 my-4 w-full text-center rounded-2xl text-white text-2xl font-bold" style="background-color: #04284E; color: #FF731D !important;">CEO Office</h1>
                <div class="team-grid flex flex-wrap justify-center items-stretch gap-6">
                    @forelse($ceoOfficeList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data CEO Office belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Human Capital -->
            <div class="team-division-section flex flex-col justify-center items-center my-4 w-full" data-division="human-capital">
                <h1 class="py-4 my-4 w-full text-center rounded-2xl text-white text-2xl font-bold" style="background-color: #04284E; color: #FF731D !important;">Divisi Human Capital</h1>
                <div class="team-grid flex flex-wrap justify-center items-stretch gap-6">
                    @forelse($hcList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Human Capital belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Business Development -->
            <div class="team-division-section flex flex-col justify-center items-center my-4 w-full" data-division="business-development">
                <h1 class="py-4 my-4 w-full text-center rounded-2xl text-white text-2xl font-bold" style="background-color: #04284E; color: #FF731D !important;">Divisi Business Development</h1>
                <div class="team-grid flex flex-wrap justify-center items-stretch gap-6">
                    @forelse($bdList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Business Development belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Marketing -->
            <div class="team-division-section flex flex-col justify-center items-center my-4 w-full" data-division="marketing">
                <h1 class="py-4 my-4 w-full text-center rounded-2xl text-white text-2xl font-bold" style="background-color: #04284E; color: #FF731D !important;">Divisi Marketing</h1>
                <div class="team-grid flex flex-wrap justify-center items-stretch gap-6">
                    @forelse($marketingList as $member)
                        @include('partials.member-card', ['member' => $member])
                    @empty
                        <div class="no-data-message"><i class="fas fa-users"></i><p>Data Marketing belum ada.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- Divisi Technology -->
            <div class="team-division-section flex flex-col justify-center items-center my-4 w-full" data-division="technology">
                <h1 class="py-4 my-4 w-full text-center rounded-2xl text-white text-2xl font-bold" style="background-color: #04284E; color: #FF731D !important;">Divisi Technology</h1>
                <div class="team-grid flex flex-wrap justify-center items-stretch gap-6">
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

<!--Import Crypto JS bzieerr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.2.0/crypto-js.min.js" integrity="sha512-a+SUDuwNzXDvz4XrIcXHuUw9nVzsTLscGdn29n07/e6wQeN2D353mS+7dI3F4Z4r1jQe4iG/a1w6qQ1iV+X/7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

            // Ambil dan dekripsi data terbaru dari endpoint /api/employees
            fetch('{{ route('api.employees') }}')
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengambil data dari API karyawan');
                    return response.json();
                })
                .then(res => {
                    if (res && res.encrypted && res.data && res.iv && typeof CryptoJS !== 'undefined') {
                        try {
                            const key = CryptoJS.enc.Hex.parse('{{ hash('sha256', config('app.key')) }}');
                            const iv = CryptoJS.enc.Base64.parse(res.iv);
                            const decrypted = CryptoJS.AES.decrypt(res.data, key, {
                                iv: iv,
                                mode: CryptoJS.mode.CBC,
                                padding: CryptoJS.pad.Pkcs7
                            });
                            const jsonStr = decrypted.toString(CryptoJS.enc.Utf8);
                            window.houseIlmuEmployees = JSON.parse(jsonStr);
                        } catch (decryptErr) {
                            console.error('Gagal mendekripsi data karyawan:', decryptErr);
                            window.houseIlmuEmployees = [];
                        }
                    } else {
                        window.houseIlmuEmployees = res;
                    }
                })
                .catch(err => {
                    console.info('Status API karyawan:', err);
                });
        });
    </script>

    <style>
        /* Culture & Value Section */
        .culture-value,
        .culture-value * {
            font-family: 'Poppins', sans-serif !important;
        }

        .culture-value h1 {
            font-weight: 900 !important;
        }

        .culture-value h2 {
            font-weight: 900 !important;
        }

        .culture-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .culture-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08);
        }

        .culture-text {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1.4;
        }

        .deal-item-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .deal-item-card:hover {
            transform: translateY(-4px);
            border-color: #1746A2;
            box-shadow: 0 10px 15px -3px rgba(23, 70, 162, 0.1);
        }

        .deal-letter {
            font-size: 2rem;
            font-weight: 900;
            line-height: 1;
        }

        .deal-text {
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.3;
        }

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