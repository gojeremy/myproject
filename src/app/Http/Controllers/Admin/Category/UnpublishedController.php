<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\View\View;

class UnpublishedController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categories = Category::where('published', 0)
            ->orderBy('id', 'desc') // 'created_at' - це приклад стовпця дати створення, замініть його на відповідний стовпець у вашій моделі
            ->get();
        return view('admin.category.index', compact('categories'));
    }
}
