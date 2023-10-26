<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\View\View;

class UnpublishedController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $posts = Post::where('published', 0)
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('admin.post.index', compact('posts'));
    }
}
