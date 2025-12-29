<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdoptionApplication;

class AdoptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cat_id'         => 'required|exists:cats,id',
            'applicant_name' => 'required',
            'license_id'     => 'required',
            'address'        => 'required',
            'phone'          => 'required',
            'email'          => 'required|email',
            'age'            => 'required|integer',
            'housing'        => 'required|in:Rent,Parents,Own',
            'employment'     => 'required|in:Full-time,Part-time,Unemployed,Student,Retired',
        ]);

        AdoptionApplication::create($request->all());

        return redirect('/')->with('success', 'Application submitted!');
    }
}
