@extends('layouts.app')

@section('content')

<div class="adoption-fullscreen">

    <div class="adoption-wrapper">

        <h1 class="adoption-title">
            ADOPTION FORM – {{ strtoupper($cat->name) }}
        </h1>

        <form action="{{ route('adoption.store') }}" method="POST" class="adoption-form">
            @csrf
            <input type="hidden" name="cat_id" value="{{ $cat->id }}">

            <input type="text" name="applicant_name" placeholder="Your Name" required> 
            <input type="text" name="license_id" placeholder="ID Number" required>

            <input type="text" name="address" placeholder="Address" required>

            <input type="text" name="partner_name" placeholder="Partner Name">
            <input type="text" name="phone" placeholder="Phone" required>

            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="age" placeholder="Age" required>

            <select name="housing" required>
                <option value="">Housing Status</option>
                <option value="Rent">Rent</option>
                <option value="Parents">Parents</option>
                <option value="Own">Own</option>
            </select>

            <select name="employment" required>
                <option value="">Employment Status</option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Unemployed">Unemployed</option>
                <option value="Student">Student</option>
                <option value="Retired">Retired</option>
            </select>

            <button type="submit">Submit Application</button>
            <div class="grid-spacer"></div>
            
        </form>

    </div>

</div>


@endsection
