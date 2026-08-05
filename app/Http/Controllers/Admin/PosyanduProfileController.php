<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PosyanduProfile;
use Illuminate\Support\Facades\Storage;

class PosyanduProfileController extends Controller
{
    public function edit()
    {
        $profile = PosyanduProfile::firstOrCreate(
            ['id' => 1],
            ['title' => 'Profil Posyandu', 'content' => 'Tuliskan profil posyandu di sini...']
        );
        
        return view('admin.posyandu-profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = PosyanduProfile::firstOrFail();

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
            $data['image'] = $request->file('image')->store('posyandu', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil Posyandu berhasil diperbarui.');
    }
}
