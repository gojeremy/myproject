<?php

namespace App\Http\Controllers\Main\TeaserFeed;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        // Попробовать получить результат из кэша, если он там есть.
        $offers = Cache::remember('offersTeaserFeed', now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->paginate(16);
        });

        // Данные были закэшированы, и теперь, если вы хотите сбросить кэш, добавьте следующую строку:
         Cache::forget('offersTeaserFeed');

        $mobile_offer = $offers->splice(0, 1);

        $desctop_offers = $offers->splice(0, 6);
        // footer: 3 элемента
        $footer_offers = $offers->take(3);

        return view('main.teaserfeed.index', compact('offers', 'mobile_offer', 'desctop_offers', 'footer_offers'));
    }
}
