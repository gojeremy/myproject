<?php

namespace App\Http\Controllers\Main\TeaserFeed;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = $this->getMenuCategories();
        list($mobile_offer, $desktop_offers) = $this->getModalContent($offers);

        $footer_offers = $this->getPool($offers, 3);

        return view('main.teaserfeed.index', compact('offers', 'mobile_offer', 'desktop_offers', 'footer_offers', 'categories'));
    }
    protected function getOffers()
    {

            return Offer::where('published', 1)
                ->whereNotNull('urlToImage')
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->paginate(18);

    }

    protected function getMenuCategories() {
        $categories = Cache::remember('categoriesTeaserIndex', now()->addMinutes(5), function () {
            return Category::where('published', 1)
                ->orderBy('priority_num','asc')
                ->get();
        });
        return $categories;
    }

    protected function getModalContent($offers)
    {
     //   $mobile_offer = $offers->splice(0, 1);
     //   $desktop_offers = $offers->splice(0, 6);
        $mobile_offer = $offers->random(1);
        $desktop_offers = $offers->random(6);

        return [$mobile_offer, $desktop_offers];
    }

    protected function getPool($data, $amount)
    {
        return $data->splice(0, $amount);
    }
}
