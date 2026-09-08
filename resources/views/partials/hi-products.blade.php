<div class="HIproducts d-flex flex-column flex-md-wrap flex-lg-wrap justify-content-start align-items-center align-content-lg-start mt-3">
    <div class="d-flex flex-wrap justify-content-around gap-3 w-100">
        @php
            $products = [
                ['name' => 'Sudut Karir', 'desc' => 'Career preparation menyeluruh.', 'img' => 'img/homepage/img-opp/product/product-img-1.webp', 'link' => route('programme.programmes') . '#sudutkarir'],
                ['name' => 'Review CV', 'desc' => 'Diskusi santai kembangkan CV.', 'img' => 'img/homepage/img-opp/product/product-img-2.webp', 'link' => route('programme.programmes') . '#review'],
                ['name' => 'Mentoring', 'desc' => 'Bimbingan karir bersama expert.', 'img' => 'img/homepage/img-opp/product/product-img-3.webp', 'link' => route('programme.programmes')],
                ['name' => 'Webinar Karir', 'desc' => 'Webinar eksklusif persiapan karir.', 'img' => 'img/homepage/img-opp/product/product-img-4.webp', 'link' => route('programme.programmes')],
            ];
        @endphp

        @foreach($products as $product)
            <div class="col-8 col-md-4 col-lg-5 productsHI-container mb-3">
                <div class="productsHI-details p-3 rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between">
                    <img src="{{ asset($product['img']) }}" alt="{{ $product['name'] }}" class="rounded-top-3 mb-2" style="width: 100%; height: 120px; object-fit: cover;">
                    <h6 class="fw-bold text-white mb-1">{{ $product['name'] }}</h6>
                    <p class="text-white mb-3 small">{{ $product['desc'] }}</p>
                    <a href="{{ $product['link'] }}" class="btn btn-sm btn-primary rounded-pill text-white mt-auto">Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
