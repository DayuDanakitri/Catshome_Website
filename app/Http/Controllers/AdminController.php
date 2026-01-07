<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\AdoptionApplication;

class AdminController extends Controller
{
    /* LOGIN */
    public function handleLogin(Request $request)
    {
        if (
            $request->username === 'admin' &&
            $request->password === 'admin123'
        ) {
            session(['admin_logged_in' => true]);
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['msg' => 'Username atau password salah']);
    }


    public function showDashboard(Request $request)
    {
        if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }
        $catQuery = Cat::query();

        if ($request->filled('keyword')) {
            $catQuery->where('name', 'like', '%' . $request->keyword . '%');
        }

        $cats = $catQuery->latest()->get();

        $applications = AdoptionApplication::with('cat')
            ->where('status', 'Pending')
            ->whereHas('cat')
            ->get();

        return view('admin.dashboard', compact('cats', 'applications'));
    }


    /* FORM INPUT CAT */
    public function showInputCats()
{
    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

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

public function editCat($id)
{
    $cat = Cat::findOrFail($id);
    return view('admin.edit_cat', compact('cat'));
}

public function updateCat(Request $request, $id)
{
    $cat = Cat::findOrFail($id);

    $data = $request->only([
        'name', 'gender', 'age', 'breed', 'location', 'description'
    ]);

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('cats', 'public');
    }

    $cat->update($data);

    return redirect('/admin/dashboard')->with('success', 'Cat updated successfully');
}
}

