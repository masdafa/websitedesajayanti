<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicDocument;
use Illuminate\Http\Request;

class PublicDocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = PublicDocument::latest();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }
        $documents = $query->paginate(10)->withQueryString();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'file_path'   => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'date_issued' => 'nullable|date',
        ]);

        $data['file_path'] = $request->file('file_path')->store('documents', 'public');

        PublicDocument::create($data);
        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function edit(PublicDocument $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, PublicDocument $document)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'file_path'   => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'date_issued' => 'nullable|date',
        ]);

        if ($request->hasFile('file_path')) {
            if ($document->file_path) {
                \Storage::disk('public')->delete($document->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('documents', 'public');
        }

        $document->update($data);
        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(PublicDocument $document)
    {
        if ($document->file_path) {
            \Storage::disk('public')->delete($document->file_path);
        }
        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
