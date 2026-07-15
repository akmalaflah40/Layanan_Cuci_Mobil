<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class FrontController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::where('status', 'Aktif')->get();

        return view('services', compact('services'));
    }

    public function booking()
    {
        return view('booking');
    }

    public function contact()
    {
        return view('contact');
    }
}
