<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home Page
    public function home()
    {
        return view('frontend.home');
    }

    // Exams Page
    public function exams()
    {
        return view('frontend.exams');
    }

    // News Page
    public function news()
    {
        return view('frontend.news');
    }

    // Rankings Page
    public function rankings()
    {
        return view('frontend.rankings');
    }

    // Downloads Page
    public function downloads()
    {
        return view('frontend.downloads');
    }

    // Gallery Page
    public function gallery()
    {
        return view('frontend.gallery');
    }

    // About Page
    public function about()
    {
        return view('frontend.about');
    }

    // Contact Page
    public function contact()
    {
        return view('frontend.contact');
    }

    // Extra Pages Link
    // Terms Of Service Page
    public function terms()
    {
        return view('frontend.terms');
    }

    // Privacy Policy Page
    public function privacy()
    {
        return view('frontend.privacy');
    }
}
