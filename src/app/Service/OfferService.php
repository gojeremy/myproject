<?php

namespace App\Service;

use App\Models\Offer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OfferService
{
    public function store($data){
        try{
            DB::beginTransaction();
            $data['urlToImage'] = Storage::disk('public')->put('/images', $data['urlToImage']);
            $offer = Offer::firstOrCreate($data);
            DB::commit();
            return $offer;
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $offer){
        try{
            DB::beginTransaction();
            if(!empty($data['urlToImage'])){
                $data['urlToImage'] = Storage::disk('public')->put('/images', $data['urlToImage']);
            }
            $offer->update($data);
            DB::commit();
            return $offer;
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
}
