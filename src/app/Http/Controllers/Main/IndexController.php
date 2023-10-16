<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Offer;


class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::where('published', 1)
            // ->where('category', 'business')
            ->select(['id', 'title', 'urlToImage', 'author', 'description', 'category'])
            ->orderBy('priority_id', 'desc')
            ->get();
        $offers = Offer::where('published', 1)
            ->orderBy('priority_id', 'desc')
            ->get();

        $mobile_offer = $offers->take(1);
     //   dd($modal_offer);
        $desctop_offers = $offers->take(6);
        // Инициализируем массивы для пулов
        $pool1 = [];
        $pool2 = [];
        $pool3 = [];
        $pool4 = [];
        $pool5 = [];
        $pool6 = [];
        $pool7 = [];
        $pool8 = [];
        $pool9 = [];

        // Пул 1: 20 элементов
        $pool1 = $posts->splice(0, 12);
        $tags = ['hot', 'popular', 'recommended'];
        $taggedPosts = [];
        foreach ($tags as $tag) {
            $taggedPosts[$tag] = $pool1->splice(0, 4);
        }

        // Пул 2: 2 элемента
        $pool2 = $posts->splice(0, 2);

        // Пул 3: 6 элементов
        $pool3 = $posts->splice(0, 5);

        // Пул 4: 8 элементов с категорией 'general'
        $pool4 = $posts->filter(function ($post) {
            return $post->category == 'general';
        })->splice(0, 8);

        // Пул 5: 6 элементов
        $pool5 = $posts->splice(0, 6);

        // Пул 6: 8 элементов с категорией 'general'
        $pool6 = $posts->filter(function ($post) {
            return $post->category == 'business';
        })->splice(0, 8);

        // Пул 7: 6 элементов
        $pool7 = $posts->splice(0, 6);

        // Пул 8: 6 элементов
        $pool8 = $posts->splice(0, 6);

        // Пул 9: 8 элементов с категорией 'business'
        $pool9 = $posts->filter(function ($post) {
            return $post->category == 'entertainment';
        })->splice(0, 8);

        return view('main.index', compact('tags', 'taggedPosts', 'pool2', 'pool3', 'pool4','pool5', 'pool6', 'pool7', 'pool8', 'pool9', 'mobile_offer', 'desctop_offers'));
    }
}