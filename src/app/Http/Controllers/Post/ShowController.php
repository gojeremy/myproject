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
        $offers = $this->getOffers();

        list($mobile_offer, $desktop_offers) = $this->getModalContent();

        $pool = $this->getPool($offers, 3);
        $pool4 = $this->getPool($offers, 8);
        $pool5 = $this->getPool($offers, 6);
        $pool6 = $this->getPool($offers, 8);
        $pool7 = $this->getPool($offers, 6);
        $pool8 = $this->getPool($offers, 6);
        $pool9 = $this->getPool($offers, 8);

        $footer_offers = $offers->splice(0, 3);
        return view('post.show', compact('post', 'pool', 'desktop_offers', 'mobile_offer', 'footer_offers', 'pool4', 'pool5', 'pool6', 'pool7', 'pool8', 'pool9'));
    }
    protected function getModalContent()
    {
        $offers = $this->getOffers();
        $mobile_offer = $offers->splice(0, 1);
        $desktop_offers = $offers->splice(0, 6);

        return [$mobile_offer, $desktop_offers];
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
