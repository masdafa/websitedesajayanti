<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Staff;
use App\Models\Product;
use App\Models\Listing;
use App\Models\Infographic;
use App\Models\IdmData;
use App\Models\PublicDocument;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts'      => Post::count(),
            'galleries'  => Gallery::count(),
            'staff'      => Staff::count(),
            'products'   => Product::count(),
            'listings'   => Listing::count(),
            'infographics' => Infographic::count(),
            'idm'        => IdmData::count(),
            'documents'  => PublicDocument::count(),
        ];

        $latestPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestPosts'));
    }
}
