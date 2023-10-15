<?php

namespace App\Service;

use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OfferService
{
    public function store($data){
        try{
            DB::beginTransaction();
            $offer = Offer::firstOrCreate($data);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $offer){
        try{
            DB::beginTransaction();
        $offer->update($data);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $offer;
    }
}
