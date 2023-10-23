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
        $offers = $this->getOffers();

        list($mobile_offer, $desktop_offers) = $this->getModalContent();

        $footer_offers = $this->getPool($offers, 3);

        return view('main.teaserfeed.index', compact('offers', 'mobile_offer', 'desktop_offers', 'footer_offers'));
    }
    protected function getOffers()
    {
        $offers = Cache::remember('offersTeaserFeed', now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->paginate(19);
        });

        //Cache::forget('offersMainIndex');
        return $offers;
    }

    protected function getModalContent()
    {
        $offers = $this->getOffers();
        $mobile_offer = $offers->splice(0, 1);
        $desktop_offers = $offers->splice(0, 6);

        return [$mobile_offer, $desktop_offers];
    }

    protected function getPool($data, $amount)
    {
        return $data->splice(0, $amount);
    }
}
