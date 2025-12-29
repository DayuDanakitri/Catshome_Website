@extends('layouts.app')

@section('content')

<section class="hero">
    <h1>BECAUSE THEY ARE FAMILY NOT JUST PETS</h1>
    <p>cats deserve more than care — they deserve people who truly understand them</p>
    <br>
    <img src="{{ asset('gambar/catshome.png') }}" alt="CatsHome Logo">
</section>

<section class="about" id="about">
    <h2>ABOUT US</h2>
    <div class="about-container">
        <div class="about-img">
            <img src="{{ asset('gambar/about_us.png') }}">
        </div>
        <div class="about-text">
            <h4>ADOPT YOUR FIRST MATE!</h4>
            <h3>GIVE LOVE A HOME — ADOPT, DON’T SHOP</h3>

            <p>
                At CatsHome, we partner with trusted local shelters and rescue groups
                to help loving animals find their forever families.
            </p>

            <p class="bold">Why Adopt with Us?</p>
            <ul>
                <li>Pre-screened, healthy, and vaccinated pets</li>
                <li>Basic checkup & starter care included</li>
                <li>Support and guidance</li>
                <li>Exclusive welcome kit</li>
            </ul>

            <a href="{{ url('/about-more') }}" class="btn-see-more">See More</a>
        </div>
    </div>
</section>

<section class="our-cats" id="our-cats">
    <h2>OUR CATS</h2>

    <div class="card-container">
        @forelse ($cats->take(3) as $cat)
            <div class="cat-card">
                <img src="{{ asset('storage/'.$cat->photo) }}" alt="{{ $cat->name }}">
                <div class="cat-name">{{ strtoupper($cat->name) }}</div>

                <a href="javascript:void(0)"
                   class="btn-cat openCatModal"
                   data-id="{{ $cat->id }}"
                   data-name="{{ $cat->name }}"
                   data-bio="{{ $cat->bio }}"
                   data-gender="{{ $cat->gender }}"
                   data-age="{{ $cat->age }}"
                   data-breed="{{ $cat->breed }}"
                   data-location="{{ $cat->location }}"
                   data-photo="{{ asset('storage/'.$cat->photo) }}">
                    Click Here
                </a>
            </div>
        @empty
            <p>No cats available.</p>
        @endforelse
    </div>

    <a href="{{ url('/cats') }}" class="btn-see-cats">See More Cats</a>

    <div class="trusted">
        <p>TRUSTED BY HUNDREDS OF PET PARENTS</p>
        <img src="{{ asset('gambar/our_cats.png') }}">
    </div>
</section>

@include('components.cat-modal')
@endsection
