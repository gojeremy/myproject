<?php

namespace App\Http\Controllers\Admin\Source;

use App\Models\Source;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    /**
     * @param Source $source
     * @return RedirectResponse
     */
    public function __invoke(Source $source): RedirectResponse
    {
        $source->delete();
        \Log::info('source | delete | success : ' . $source['name']);
        return redirect()->route('admin.source.index');
    }
}
