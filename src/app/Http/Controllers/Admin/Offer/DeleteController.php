<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Offer;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Offer $offer): RedirectResponse
    {
        $offer->delete();
        \Log::info('offer | delete | success : ' . $offer->id);
        return redirect()->route('admin.offer.index');
    }
}
