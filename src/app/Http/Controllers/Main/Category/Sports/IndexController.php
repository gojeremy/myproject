<?php

namespace App\Http\Controllers\Main\Category\Sports;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $posts = Post::where('published', 1)
            ->where('category', 'sports')
            ->orderBy('priority_id', 'desc')
            ->paginate(36);

        $tags = ['hot', 'popular', 'recommended', 'general'];
        $taggedPosts = [];
        foreach ($tags as $tag) {
            $taggedPosts[$tag] = $posts->splice(0, 9); // Берем первые 12 элементов (посты в порядке)
        }
        return view('main.category.sports.index', compact('taggedPosts', 'tags', 'posts'));
    }
}
