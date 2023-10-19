<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Requests\Admin\Offer\UpdateRequest;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Offer $offer
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Offer $offer): RedirectResponse
    {
        $data = $request->validated();
        $offer = $this->service->update($data, $offer);
        return redirect()->route('admin.offer.edit', ['offer' => $offer->id]);
    }
}
