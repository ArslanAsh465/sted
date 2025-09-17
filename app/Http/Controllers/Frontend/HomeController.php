<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\News;
use App\Models\Download;
use App\Models\Gallery;

class HomeController extends Controller
{
    protected $data = [];

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
        $today = Carbon::today()->toDateString();

        $this->data['news'] = News::where('status', '1')
            ->where(function ($query) use ($today) {
                $query->whereNull('start_time')->orWhere('start_time', '<=', $today);
            })
            ->where(function ($query) use ($today) {
                $query->whereNull('end_time')->orWhere('end_time', '>=', $today);
            })
            ->latest()
            ->get();

        return view('frontend.news', $this->data);
    }

    // Rankings Page
    public function rankings()
    {
        return view('frontend.rankings');
    }

    // Downloads Page
    public function downloads()
    {
        $today = Carbon::today()->toDateString();

        $this->data['downloads'] = Download::where('status', '1')
            ->where(function ($query) use ($today) {
                $query->whereNull('start_time')->orWhere('start_time', '<=', $today);
            })
            ->where(function ($query) use ($today) {
                $query->whereNull('end_time')->orWhere('end_time', '>=', $today);
            })
            ->latest()
            ->get();

        return view('frontend.downloads', $this->data);
    }

    // Gallery Page
    public function gallery()
    {
        $today = Carbon::today()->toDateString();

        $this->data['galleries'] = Gallery::where('status', '1')
            ->where(function ($query) use ($today) {
                $query->whereNull('start_time')->orWhere('start_time', '<=', $today);
            })
            ->where(function ($query) use ($today) {
                $query->whereNull('end_time')->orWhere('end_time', '>=', $today);
            })
            ->latest()
            ->get();

        return view('frontend.gallery', $this->data);
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
