<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $heroPath = public_path('Images/hero');
        $imageUrls = [];

        if (File::isDirectory($heroPath)) {
            foreach (File::files($heroPath) as $image) {
                $imageUrls[] = asset('Images/hero/' . $image->getFilename());
            }
        }

        return view('home', compact('imageUrls'));
    }
}
