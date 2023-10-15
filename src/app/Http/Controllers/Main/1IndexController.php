<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;


class IndexController extends Controller
{
    public function __invoke()
    {
        // Получаем все посты с тегами
        $posts = Post::with('tags')
            ->orderBy('created_at', 'desc')
            ->get();

        // Получаем все теги
        $tags = Tag::all();

        // 1 Колекция на главную страницу в топ
        $shuffledPosts = $posts->shuffle(); // Перемешивание исходной коллекции постов
        $collection1 = $shuffledPosts->take(3)->unique(); // Первая коллекция из первых 2 уникальных постов 
        $remainingPosts = $shuffledPosts->diff($collection1); // Оставшиеся посты после формирования первой коллекции
        
        

        // 1.1 колекция на главную в топ
        $collection11 = collect();
        $collection11 = $remainingPosts->take(2)->unique();
        $remainingPosts = $remainingPosts->diff($collection11);

        // 2 Колекция на главную страницу 
        $collection2 = collect(); // Создаем пустую коллекцию для второй коллекции тегов

        $tags->each(function ($tag) use ($remainingPosts, $collection2) {
            $postsWithTag = $remainingPosts->filter(function ($post) use ($tag) {
                return $post->tags->contains('id', $tag->id);
            })->take(6); // Фильтруем посты с определенным тегом и берем не более 6 постов

            if ($postsWithTag->isNotEmpty()) {
                $collection2->put($tag->id, $postsWithTag);
            }
        });

        $posts->each(function ($post) {
            $post->tag_ids  = $post->tags->pluck('id'); // Получение массива идентификаторов тегов
            $post->tag_titles = $post->tags->pluck('title'); // Получение массива заголовков тегов
        });
        
        $uniqueTagTitles = $posts->pluck('tag_titles')->flatten()->unique()->toArray();
        $uniqueTagIds = $posts->pluck('tag_ids')->flatten()->unique()->toArray();

        // 3 колекция
        $remainingPosts = $remainingPosts->diff($posts->collapse()); // Оставшиеся посты после формирования второй коллекции тегов

        $collection3 = $remainingPosts->take(3)->unique(); // Третья коллекция из первых 5 уникальных постов, оставшихся после формирования первых двух
       

        $remainingPosts = $remainingPosts->diff($collection3);
        $collection4 = $remainingPosts->take(3)->unique();
        //dd($collection4);


        return view('main.index', compact('posts', 'collection1', 'collection11', 'collection2', 'collection3', 'collection4', 'uniqueTagTitles'));
    }
}
