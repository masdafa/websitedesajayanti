<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::orderBy('order')->paginate(20);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question'     => 'required|string',
            'answer'       => 'required|string',
            'order'        => 'nullable|integer',
            'is_published' => 'boolean',
        ]);
        $data['is_published'] = $request->has('is_published');
        Faq::create($data);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question'     => 'required|string',
            'answer'       => 'required|string',
            'order'        => 'nullable|integer',
            'is_published' => 'boolean',
        ]);
        $data['is_published'] = $request->has('is_published');
        $faq->update($data);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
