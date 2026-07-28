<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $documents = Document::when($search, fn($q) => $q->where('title', 'like', "%$search%"))
            ->latest()
            ->paginate(15);
        return view('admin.documents.index', compact('documents', 'search'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'file'         => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'category'     => 'required|string|max:100',
            'is_published' => 'boolean',
        ]);

        $data['file_path'] = $request->file('file')->store('documents', 'public');
        $data['is_published'] = $request->has('is_published');
        unset($data['file']);

        Document::create($data);
        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'file'         => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'category'     => 'required|string|max:100',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }
        $data['is_published'] = $request->has('is_published');
        unset($data['file']);

        $document->update($data);
        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
