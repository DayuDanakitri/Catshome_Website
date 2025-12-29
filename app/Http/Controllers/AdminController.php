<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Cat;
use App\Models\AdoptionApplication;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /* LOGIN */
    public function handleLogin(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged_in' => true]);
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['msg'=>'Username atau password salah']);
    }

    /* DASHBOARD */
    public function showDashboard()
    {
        $cats = Cat::latest()->get();
        $applications = AdoptionApplication::with('cat')
        ->where('status', 'Pending')
        ->whereHas('cat')
        ->get();
        return view('admin.dashboard', compact('cats','applications'));
    }

    /* FORM INPUT CAT */
    public function showInputCats()
    {
        return view('admin.input_cats');
    }

    /* STORE CAT */
    public function storeCat(Request $request)
    {
        $path = $request->file('photo')->store('cats','public');

        Cat::create([
            'name'      => $request->name,
            'bio'       => $request->description,
            'gender'    => $request->gender,
            'age'       => $request->age,
            'breed'     => $request->breed,
            'location'  => $request->location,
            'photo'     => $path,
            'status'    => 'Available'
        ]);

        return redirect('/admin/dashboard');
    }

    /* ACCEPT ADOPTION */
    public function acceptAdoption($id)
    {
        $app = AdoptionApplication::findOrFail($id);

        $app->update(['status' => 'Accepted']);
        $app->cat->update(['status' => 'Adopted']);

        return back();
    }

    public function declineAdoption($id)
{
    $applicant = \App\Models\AdoptionApplication::findOrFail($id);
    $applicant->delete(); // hapus data applicant
    return redirect()->back()->with('success', 'Application declined successfully.');
}

public function deleteCat($id)
{
    $cat = Cat::findOrFail($id);
    $cat->delete();

    return back()->with('success', 'Cat deleted successfully');
}
}

