<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Offer;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $offers = Offer::where('published', 1)
            ->orderBy('id', 'desc') // 'created_at' - це приклад стовпця дати створення, замініть його на відповідний стовпець у вашій моделі
            ->paginate(15);

        return view('admin.offer.index', compact('offers'));
    }
}
