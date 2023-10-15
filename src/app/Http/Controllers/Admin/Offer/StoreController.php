<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Requests\Admin\Offer\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.offer.index');
    }
}
