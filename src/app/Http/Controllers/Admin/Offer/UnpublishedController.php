<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Offer;
use Illuminate\View\View;

class UnpublishedController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $offers = Offer::where('published', 0)->paginate(15);
        return view('admin.offer.index', compact('offers'));
    }
}
