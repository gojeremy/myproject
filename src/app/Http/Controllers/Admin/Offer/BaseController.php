<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use App\Service\OfferService;

class BaseController extends Controller
{
      public OfferService $service;

    /**
     * @param OfferService $service
     */
    public function __construct(OfferService $service)
      {
          $this->service = $service;
      }
}
