<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        $user->load('avatarBase', 'userItems.item');

        return response()->json([
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'avatar_base_id' => ['sometimes', 'exists:avatar_bases,id'],
            'equipped_items' => ['sometimes', 'array'],
            'equipped_items.*' => ['exists:items,id'],
        ]);

        $user = $request->user();

        if (isset($validated['name'])) {
            $user->update(['name' => $validated['name']]);
        }

        if (isset($validated['avatar_base_id'])) {
            $user->update(['avatar_base_id' => $validated['avatar_base_id']]);
        }

        if (isset($validated['equipped_items'])) {
            $user->userItems()->update(['equipped' => false]);
            foreach ($validated['equipped_items'] as $itemId) {
                $user->userItems()
                    ->where('item_id', $itemId)
                    ->update(['equipped' => true]);
            }
        }

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user->load('avatarBase', 'userItems.item'),
        ]);
    }
}
