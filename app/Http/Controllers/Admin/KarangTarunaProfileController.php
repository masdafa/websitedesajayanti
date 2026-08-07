<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KarangTarunaProfile;
use Illuminate\Support\Facades\Storage;

class KarangTarunaProfileController extends Controller
{
    public function edit()
    {
        $profile = KarangTarunaProfile::firstOrCreate(
            ['id' => 1],
            ['title' => 'Profil Karang Taruna', 'content' => 'Tuliskan profil karang taruna di sini...']
        );
        
        return view('admin.karang-taruna-profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = KarangTarunaProfile::firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = $request->only(['title', 'content']);

        if ($request->hasFile('image')) {
            if ($profile->image && Storage::disk('public')->exists($profile->image)) {
                Storage::disk('public')->delete($profile->image);
            }
            $data['image'] = $request->file('image')->store('karang-taruna', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil Karang Taruna berhasil diperbarui.');
    }
}
