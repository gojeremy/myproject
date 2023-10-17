<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Offer;
use Illuminate\Support\Facades\Cache;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        // Попробовать получить результат из кэша, если он там есть.
        $offers = Cache::remember('offersPostShow', now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->whereNotNull('urlToImage')
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->get();
        });
        // Данные были закэшированы, и теперь, если вы хотите сбросить кэш, добавьте следующую строку:
         Cache::forget('offersPostShow');

        // Инициализируем массивы для пулов
        $desctop_offers = [];
        $pool1 = [];
        $pool2 = [];
        $pool3 = [];
        $pool4 = [];

        // desctop offers
        $desctop_offers = $offers->splice(0, 2);
        // mobile offer
        $mobile_offer = $offers->splice(0, 1);
        // pool #1
        $pool1 = $offers->splice(0, 2);
        // pool #2
        $pool2 = $offers->splice(0, 4);
        // pool #3
        $pool3 = $offers->splice(0, 6);
        // pool #4
        $pool4 = $offers->splice(0, 6);
        // footer
        $footer = $offers->splice(0, 3);

        return view('post.show', compact('post', 'desctop_offers', 'mobile_offer', 'pool1', 'pool2', 'pool3', 'pool4', 'footer'));
    }
}
