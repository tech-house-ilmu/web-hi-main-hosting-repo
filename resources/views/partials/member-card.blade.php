@php
    $defaultAvatar = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280 300" fill="none"><rect width="280" height="300" fill="%23F3F4F6"/><circle cx="140" cy="115" r="45" fill="%23CBD5E1"/><path d="M70 255c0-38.66 31.34-70 70-70s70 31.34 70 70v15H70v-15z" fill="%23CBD5E1"/></svg>';
    $pos = $member->leaders_details_position;
    $sub = $member->leaders_details_sub_division;
    $div = $member->leaders_details_position_division;
    
    if ($pos === 'VP' || $pos === 'Vice President') {
        $displayPos = 'VP ' . $div;
    } elseif ($pos === 'Head of') {
        $displayPos = 'Head of';
    } elseif ($pos === 'Staff') {
        $displayPos = 'Staff';
    } else {
        $displayPos = $pos;
    }
@endphp
<div class="member-card" data-aos="fade-up">
    <div class="member-image-container">
        <img src="{{ !empty($member->leaders_details_img) ? asset('storage/' . $member->leaders_details_img) : $defaultAvatar }}" 
            alt="{{ $member->leaders_details_name }}"
            loading="lazy"
            onerror="this.src='{{ $defaultAvatar }}'">
        
        <div class="member-overlay">
            <div class="member-social-links">
                @if(!empty($member->leaders_details_linkedin))
                    <a href="{{ $member->leaders_details_linkedin }}" target="_blank" rel="noopener noreferrer" class="social-link" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                @endif
                @if(!empty($member->leaders_details_email))
                    <a href="mailto:{{ $member->leaders_details_email }}" class="social-link" title="{{ $member->leaders_details_email }}">
                        <i class="fas fa-envelope"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
    
    <div class="member-info">
        <h3 class="member-position">{{ $displayPos }}</h3>
        @if(!empty($sub) && !in_array($pos, ['CEO', 'CEO HI', 'VP', 'Vice President']))
            <p class="member-subdivision">{{ $sub }}</p>
        @endif
        <h5 class="member-name">{{ $member->leaders_details_name }}</h5>
    </div>
</div>
