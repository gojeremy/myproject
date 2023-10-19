<?php

namespace App\Http\Controllers\Main\Category;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class BaseController extends Controller
{
    protected string $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function __invoke(): View
    {
        $posts = $this->getCategoryPosts();
        $offers = $this->getCategoryOffers();

        $tags = ['hot', 'popular', 'recommended'];
        $taggedPosts = $this->getTaggedPosts($tags, $posts);

        $mobile_offer = $offers->splice(0, 1);
        $desctop_offers = $offers->splice(0, 6);

        $footerPosts = Post::all();
        $footer = $footerPosts->take(3);

        return view("main.category.index", compact('taggedPosts', 'tags', 'posts', 'mobile_offer', 'desctop_offers', 'footer'));
    }

    protected function getCategoryPosts()
    {
        return Cache::remember("postsMainCategory{$this->category}Index", now()->addMinutes(5), function () {
            return Post::where('published', 1)
                ->where('category', $this->category)
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'author', 'description', 'category'])
                ->paginate(27);
        });
    }

    protected function getCategoryOffers()
    {
        return Cache::remember("offersMainCategory{$this->category}Index", now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->whereNotNull('urlToImage')
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->get();
        });
    }

    protected function getTaggedPosts(array $tags, $posts)
    {
        $taggedPosts = [];

        foreach ($tags as $tag) {
            $taggedPosts[$tag] = $posts->splice(0, 9);
        }

        return $taggedPosts;
    }
}
