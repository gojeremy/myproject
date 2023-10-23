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

        list($mobile_offer, $desktop_offers) = $this->getModalContent();

        $tags = $this->getTags();
        $taggedPosts = $this->getTaggedPosts($posts);

        $footer = $this->getPool($posts, 3);

        return view("main.category.index", compact('taggedPosts', 'posts', 'tags', 'mobile_offer', 'desktop_offers', 'footer'));
    }
    protected function getTags(): array
    {
        return ['hot', 'popular', 'recommended'];
    }

    protected function getTaggedPosts($data)
    {
        $taggedPosts = [];
        $tags = $this->getTags();
        foreach($tags as $tag) {
            $taggedPosts[$tag] = $data->splice(0, 12);
        }
        return $taggedPosts;
    }

    protected function getModalContent(): array
    {
        $offers = $this->getOffers();
        $mobile_offer = $offers->splice(0, 1);
        $desktop_offers = $offers->splice(0, 6);

        return [$mobile_offer, $desktop_offers];
    }

    protected function getCategoryPosts()
    {
        return Cache::remember("postsMainCategory{$this->category}Index", now()->addMinutes(5), function () {
            return Post::where('published', 1)
                ->where('category', $this->category)
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'author', 'description', 'category'])
                ->paginate(39);
        });
    }

    protected function getPostsByCategory($posts, $category, $count)
    {
        return $posts->filter(function ($post) use ($category) {
            return $post->category == $category;
        })->splice(0, $count);
    }

    protected function getOffers()
    {
        $offers = Cache::remember('offersMainIndex', now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->whereNotNull('urlToImage')
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->get();
        });

        //Cache::forget('offersMainIndex');
        return $offers;
    }

    protected function getPool($data, $amount)
    {
        return $data->splice(0, $amount);
    }
}
