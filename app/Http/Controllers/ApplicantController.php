<?php

use App\Models\Cat;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function create(Cat $cat)
    {
        return view('adoption-form', compact('cat'));
    }

    public function store(Request $request, Cat $cat)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'reason' => 'required',
        ]);

        Applicant::create([
            'cat_id' => $cat->id,
            'name' => $request->name,
            'email' => $request->email,
            'reason' => $request->reason,
        ]);

        return redirect('/')
            ->with('success', 'Adoption request sent successfully!');
    }
}
