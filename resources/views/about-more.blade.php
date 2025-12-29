@extends('layouts.app')

@section('content')
<section class="about-more-section">
    <h1>MEET THE FOUNDERS!</h1>
    <div class="about-more-wrapper">
        <div class="about-left">
            <div class="quote-box pink-box">
                “Our goal is to connect cat lovers with cats in need of a family”
            </div>
            <p class="student-name">Nais, Information Technology student at Udayana University</p>
        </div>

        <div class="about-image">
            <img src="{{ asset('gambar/us.png') }}" alt="Founders Image">
        </div>

        <div class="about-right">
            <div class="quote-box blue-box">
                “We created Catshome because every cat deserves a loving home”
            </div>
            <p class="student-name">Dayumas, Information Technology student at Udayana University</p>
        </div>
    </div>
</section>
@endsection
