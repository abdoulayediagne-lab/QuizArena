<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function uploadCustom(Request $request)
    {
        $validated = $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,gif', 'max:2048'],
        ]);

        $user = $request->user();

        if ($user->avatar_image_path && file_exists(storage_path('app/public/' . $user->avatar_image_path))) {
            unlink(storage_path('app/public/' . $user->avatar_image_path));
        }

        $path = $validated['avatar']->store('avatars', 'public');
        $user->update(['avatar_image_path' => $path]);

        return response()->json([
            'message' => 'Avatar uploaded successfully',
            'avatar_path' => asset('storage/' . $path),
        ]);
    }

    public function selectBase(Request $request)
    {
        $validated = $request->validate([
            'avatar_base_id' => ['required', 'exists:avatar_bases,id'],
        ]);

        $user = $request->user();
        $user->update(['avatar_base_id' => $validated['avatar_base_id']]);

        return response()->json([
            'message' => 'Avatar base selected successfully',
            'avatar_base' => $user->avatarBase,
        ]);
    }
}
