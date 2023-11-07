<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;


class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $posts = $this->getPosts();
        $categories = $this->getMenuCategories();
        list($mobile_offer, $desktop_offers) = $this->getModalContent();

        $tags = $this->getTags();
        $taggedPosts = $this->getTaggedPosts($posts);
        $pool2 = $this->getPool($posts, 2);
        $pool3 = $this->getPool($posts, 5);

        $pool4 = $this->getPostsByCategory($posts, 'general', 8);
        $pool5 = $this->getPool($posts, 6);
        $pool6 = $this->getPostsByCategory($posts, 'business', 8);
        $pool7 = $this->getPool($posts, 6);
        $pool8 = $this->getPool($posts, 6);
        $pool9 = $this->getPostsByCategory($posts, 'entertainment', 8);

        $footer = $this->getPool($posts, 3);

        return view('main.index', compact('tags', 'taggedPosts', 'pool2', 'pool3', 'pool4','pool5', 'pool6', 'pool7', 'pool8', 'pool9', 'mobile_offer', 'desktop_offers', 'footer', 'categories'));
    }
    protected function getMenuCategories() {
        $categories = Cache::remember('categoriesMainIndex', now()->addMinutes(5), function () {
            return Category::where('published', 1)
                ->orderBy('priority_num','asc')
                ->get();
        });
        return $categories;
    }
    protected function getTags()
    {
        return ['hot', 'popular', 'recommended'];
    }

    protected function getTaggedPosts($data)
    {
        $taggedPosts = [];
        $tags = $this->getTags();
        foreach($tags as $tag) {
            $taggedPosts[$tag] = $data->splice(0, 6);
        }
        return $taggedPosts;
    }

    protected function getPosts()
    {
        $posts = Cache::remember('postsMainIndex', now()->addMinutes(5), function () {
            return Post::where('published', 1)
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url', 'category', 'author'])
                ->get();
        });

        //  Cache::forget('postsMainIndex');
        return $posts;
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

    protected function getModalContent()
    {
        $offers = $this->getOffers();
     //   $mobile_offer = $offers->splice(0, 1);
      //  $desktop_offers = $offers->splice(0, 6);
        $mobile_offer = $offers->random(1);
        $desktop_offers = $offers->random(6);


        return [$mobile_offer, $desktop_offers];
    }

    protected function getPool($data, $amount)
    {
        return $data->splice(0, $amount);
    }

    protected function getPostsByCategory($posts, $category, $count)
    {
        return $posts->filter(function ($post) use ($category) {
            return $post->category == $category;
        })->splice(0, $count);
    }
}
