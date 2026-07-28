<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Staff;
use App\Models\Product;
use App\Models\Agenda;
use App\Models\Document;
use App\Models\Faq;
use App\Models\ResidentReport;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts'    => Post::count(),
            'galleries'=> Gallery::count(),
            'staff'    => Staff::count(),
            'products' => Product::count(),
            'agendas'  => Agenda::count(),
            'documents'=> Document::count(),
            'faqs'     => Faq::count(),
            'reports'  => ResidentReport::where('status', 'pending')->count(),
        ];

        $latestPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestPosts'));
    }
}
