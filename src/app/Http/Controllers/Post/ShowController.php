<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Offer;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * @param Post $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        // Попробовать получить результат из кэша, если он там есть.
        $offers = Cache::remember('offersPostShow', now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->whereNotNull('urlToImage')
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->paginate(22);
        });
        // Данные были закэшированы, и теперь, если вы хотите сбросить кэш, добавьте следующую строку:
         Cache::forget('offersPostShow');

         // pool
         $pool = $offers->splice(0, 3);
        // desctop offers
        $desctop_offers = $offers->splice(0, 9);
        // mobile offer
        $mobile_offer = $offers->splice(0, 1);
        // footer
        $footer_offers = $offers->splice(0, 3);
      // dd($offers);
        return view('post.show', compact('post', 'pool', 'desctop_offers', 'mobile_offer', 'footer_offers', 'offers'));
    }
}
