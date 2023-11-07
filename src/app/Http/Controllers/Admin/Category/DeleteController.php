<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Category $category): RedirectResponse
    {
        $category->delete();
        \Log::info('category | delete | success : ' . $category->id . ',' . $category->name);
        return redirect()->route('admin.category.index');
    }
}
