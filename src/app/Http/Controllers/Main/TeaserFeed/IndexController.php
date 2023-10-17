<?php

namespace App\Http\Controllers\Main\TeaserFeed;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        // Попробовать получить результат из кэша, если он там есть.
        $offers = Cache::remember('offersTeaserFeed', now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->paginate(12);
        });
        // Данные были закэшированы, и теперь, если вы хотите сбросить кэш, добавьте следующую строку:
         Cache::forget('offersTeaserFeed');

        $mobile_offer = $offers->take(1);
        $desktop_offers = $offers->take(6);
        // footer: 3 элемента
        $footer = $offers->take(3);

        return view('main.teaserfeed.index', compact('offers', 'mobile_offer', 'desktop_offers'));
    }
}
