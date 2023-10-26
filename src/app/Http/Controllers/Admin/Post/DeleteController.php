<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $post->delete();
        \Log::info('post | delete | success : ' . $post->id);
        return redirect()->route('admin.post.index');
    }
}
