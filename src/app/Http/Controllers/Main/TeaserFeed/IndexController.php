<?php

namespace App\Http\Controllers\Main\TeaserFeed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.teaserfeed.index');
    }
}
