<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatController extends Controller
{
    // sample data (id, nama, isi, foto)
    private function sampleCats()
    {
        return [
            ['id'=>1,'nama'=>'Milo','isi'=>'Milo is a playful little kitten...','foto'=>'cat1.jpg'],
            ['id'=>2,'nama'=>'Luna','isi'=>'Luna loves naps and cuddles...','foto'=>'cat2.jpg'],
            ['id'=>3,'nama'=>'Oliver','isi'=>'Oliver is a calm older cat...','foto'=>'cat3.jpg'],
            ['id'=>4,'nama'=>'Simba','isi'=>'Simba likes to explore...','foto'=>'cat4.jpg'],
        ];
    }

    public function index()
    {
        $cats = $this->sampleCats();
        return view('pagecats', compact('cats'));
    }

    // For Pagecats.php route
    public function pageCats()
    {
        $cats = $this->sampleCats();
        return view('pagecats', compact('cats'));
    }

    public function show($id)
    {
        $cats = $this->sampleCats();
        $cat = collect($cats)->firstWhere('id', (int)$id);
        if (!$cat) {
            return view('cats.show', ['cat' => null]);
        }
        return view('cats.show', compact('cat'));
    }
}
