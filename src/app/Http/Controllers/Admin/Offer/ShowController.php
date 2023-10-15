<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Offer;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * @param Offer $offer
     * @return View
     */
    public function __invoke(Offer $offer): View
    {
        return view('admin.offer.show', compact('offer'));
    }
}
