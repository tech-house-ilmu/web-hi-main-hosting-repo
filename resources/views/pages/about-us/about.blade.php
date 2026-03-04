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
                    <img class="horizontal-img d-none d-md-block" src="{{ asset('img/homepage/about/timeline-horizontal.png') }}" alt="timeline image">
                    <img class="vertical-img d-block d-md-none" src="{{ asset('img/homepage/about/timeline-vertical.png') }}"
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
            <h1 class="py-4" style="color: #1746A2;">Board of Director</h1>

            <!-- Chief Officer Section -->
            <div class="chief d-flex flex-column justify-content-center align-items-center my-5 w-100">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">Chief Officer</h1>

                <div class="chief-member d-flex flex-wrap justify-content-center align-items-stretch gap-4">
                    @php
                        $chiefPositions = ['CEO', 'CTO', 'CMO', 'COO', 'CFO']; // daftar posisi chief yang bisa ditulis
                    @endphp

                    @forelse($LeadersDetailsAbout->whereIn('leaders_details_position', $chiefPositions) as $chief)
                        <div class="member-card" data-aos="fade-up">
                            <div class="member-image-container">
                                <img src="{{ asset('storage/' . $chief->leaders_details_img) }}" 
                                    alt="{{ $chief->leaders_details_name }}"
                                    loading="lazy"
                                    onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjI0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSI0MCIgZmlsbD0iIzlhOWE5YSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPj88L3RleHQ+PC9zdmc+'">
                                
                                <div class="member-overlay">
                                    <div class="member-social-links">
                                        @if($chief->leaders_details_linkedin)
                                            <a href="{{ $chief->leaders_details_linkedin }}" target="_blank" rel="noopener noreferrer" class="social-link">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        @endif
                                        @if($chief->leaders_details_email)
                                            <a href="mailto:{{ $chief->leaders_details_email }}" class="social-link">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="member-info">
                                <h3 class="member-position">{{ $chief->leaders_details_position }}</h3>
                                <h5 class="member-name">{{ $chief->leaders_details_name }}</h5>
                            </div>
                        </div>
                        @empty
                        <div class="no-data-message">
                            <i class="fas fa-users"></i>
                            <p>Data Chief belum ada.</p>
                        </div>
                    @endforelse
                </div>

            </div>

            <!-- Vice President Section -->
            <div class="vice d-flex flex-column justify-content-center align-items-center my-5 w-100">
                <h1 class="py-4 my-4 w-100 text-center rounded-4 text-white" style="background-color: #04284E; color: #FF731D !important;">Vice President</h1>

                <div class="vice-member d-flex flex-wrap justify-content-center align-items-stretch gap-4">

                    @forelse($LeadersDetailsAbout->where('leaders_details_position', 'VP') as $leaders)
                        <div class="member-card" data-aos="fade-up">
                            <div class="member-image-container">
                                <img src="{{ asset('storage/' . $leaders->leaders_details_img) }}" 
                                    alt="{{ $leaders->leaders_details_name }}"
                                    loading="lazy"
                                    onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjI0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSI0MCIgZmlsbD0iIzlhOWE5YSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPj88L3RleHQ+PC9zdmc+'">

                                <div class="member-overlay">
                                    <div class="member-social-links">
                                        @if($leaders->leaders_details_linkedin)
                                            <a href="{{ $leaders->leaders_details_linkedin }}" target="_blank" rel="noopener noreferrer" class="social-link">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        @endif
                                        @if($leaders->leaders_details_email)
                                            <a href="mailto:{{ $leaders->leaders_details_email }}" class="social-link">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="member-info">
                                @php
                                    $position = $leaders->leaders_details_position;

                                    if ($leaders->leaders_details_position_division) {
                                        $position .= ' ' . $leaders->leaders_details_position_division;
                                    }
                                @endphp
                                <h3 class="member-position">{{ $position }}</h3>
                                <h5 class="member-name">{{ $leaders->leaders_details_name }}</h5>
                            </div>
                        </div>
                        @empty
                        <div class="no-data-message">
                            <i class="fas fa-users"></i>
                            <p>Data Vice President belum ada.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </section>
    <!-- End about profile images section -->

    <style>
        /* Custom gap for better spacing */
        .chief-member, .vice-member {
            gap: 3rem !important; /* 40px */
            padding: 0 2rem; /* 24px padding kiri-kanan */
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
            overflow: hidden;
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
            padding: 24px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .member-position {
            font-weight: bold;
            color: #1746A2;
            margin: 0 0 12px 0;
            font-size: 1.25rem;
        }

        .member-name {
            color: #374151;
            margin: 0;
            font-size: 1.1rem;
            font-weight: 500;
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
                padding: 20px;
            }
            
            .member-position {
                font-size: 1.1rem;
            }
            
            .member-name {
                font-size: 1rem;
            }
        }
    </style>
@endsection