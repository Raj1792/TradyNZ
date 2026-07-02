<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $heroPath = public_path('images/hero');
        $imageUrls = [];

        if (File::isDirectory($heroPath)) {
            foreach (File::files($heroPath) as $image) {
                $imageUrls[] = asset('images/hero/' . $image->getFilename());
            }
        }

        return view('home', compact('imageUrls'));
    }
}
