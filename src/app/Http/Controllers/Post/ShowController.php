<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Offer;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        //   $offers = Offer::all();
        // dd($offers);
        //    $recentOffers = $offers->take(5)->unique();

        //   $posts = Post::with('tags')
        //       ->orderBy('created_at', 'desc')
        //       ->get();
        //   $recentPosts = $posts->take(5)->unique();
        return view('post.show', compact('post'));
    }
}
