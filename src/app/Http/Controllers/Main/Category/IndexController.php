<?php

namespace App\Http\Controllers\Main\Category;

use App\Models\Offer;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Http\Request;


class IndexController extends BaseController
{
    public function __invoke(Request $request, $category)
    {
        if (!$this->categoryExists($category)) {
            abort(404);
        }
        return parent::__invoke($request, $category);
    }
    public function categoryExists($categoryName)
    {
        // Ищем категорию с заданным именем
        $category = Category::where('idName', $categoryName)->first();

        return $category !== null;
    }
}
