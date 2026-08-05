<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::latest();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        $posts = $query->paginate(10)->withQueryString();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:posts,slug',
            'type'         => 'required|in:berita,pengumuman',
            'content'      => 'required|string',
            'images'       => 'nullable|array|max:10',
            'images.*'     => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'nullable|boolean',
            'created_at'   => 'nullable|date',
        ]);

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('posts', 'public');
            }
            $data['images'] = $imagePaths;
        }
        $data['is_published'] = $request->boolean('is_published');

        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'type'         => 'required|in:berita,pengumuman',
            'content'      => 'required|string',
            'images'       => 'nullable|array|max:10',
            'images.*'     => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'nullable|boolean',
            'created_at'   => 'nullable|date',
        ]);

        if ($request->hasFile('images')) {
            if (!empty($post->images)) {
                foreach ($post->images as $img) {
                    if (\Storage::disk('public')->exists($img)) \Storage::disk('public')->delete($img);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('posts', 'public');
            }
            $data['images'] = $imagePaths;
        }
        $data['is_published'] = $request->boolean('is_published');

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        if (!empty($post->images)) {
            foreach ($post->images as $img) {
                if (\Storage::disk('public')->exists($img)) \Storage::disk('public')->delete($img);
            }
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil dihapus.');
    }
}
