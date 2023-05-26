<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function getDataByUserId()
    {
        $userId = auth()->id();
        $posts = Post::where('id_user', $userId)
                    ->whereNull('deleted_at')
                    ->orderByDesc('id')
                    ->get();

        return response()->json([
            'message' => 'Data retrieved successfully',
            'posts' => $posts,
        ]);
    }
}
