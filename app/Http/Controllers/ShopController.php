<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $items = Item::orderByRaw("CASE rarity WHEN 'common' THEN 0 WHEN 'rare' THEN 1 WHEN 'epic' THEN 2 WHEN 'legendary' THEN 3 END")->get();

        $items->each(function ($item) use ($user) {
            $item->is_owned = $user->userItems()->where('item_id', $item->id)->exists();
        });

        return response()->json([
            'items' => $items,
        ]);
    }

    public function buy(Request $request, Item $item)
    {
        $user = $request->user();

        if ($item->locked) {
            return response()->json(['message' => 'Item verrouillé'], 403);
        }

        if ($user->coins < $item->price) {
            return response()->json([
                'message' => 'Insufficient coins',
            ], 400);
        }

        if ($user->userItems()->where('item_id', $item->id)->exists()) {
            return response()->json([
                'message' => 'Item already owned',
            ], 400);
        }

        $user->update(['coins' => $user->coins - $item->price]);

        $user->userItems()->create([
            'item_id' => $item->id,
            'equipped' => false,
        ]);

        $user->transactions()->create([
            'amount' => -$item->price,
            'type' => 'spend',
            'reason' => 'Purchase: ' . $item->name,
        ]);

        return response()->json([
            'message' => 'Item purchased successfully',
            'coins' => $user->coins,
            'item' => $item,
        ]);
    }
}
