<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
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
        $category = $this->service->store($data);
        return redirect()->route('admin.category.edit', ['category' => $category->id]);
    }
}
