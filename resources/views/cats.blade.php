@extends('layouts.app')

@section('content')

<section class="all-cats">
    <h2>ALL AVAILABLE CATS</h2>

    <div class="card-container">
        @forelse ($cats as $cat)
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
                    View Detail
                </a>
            </div>
        @empty
            <p>No cats found.</p>
        @endforelse
    </div>
</section>

@include('components.cat-modal')
@endsection
