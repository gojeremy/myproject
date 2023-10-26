<?php

namespace App\Service;

use App\Models\Offer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OfferService
{
    public function store($data){
        try{
            DB::beginTransaction();
            $data['urlToImage'] = Storage::disk('public')->put('/images', $data['urlToImage']);
            $offer = Offer::firstOrCreate($data);
            DB::commit();
            \Log::info('offer | create | success : ' . $offer->id);
            return $offer;
        } catch (\Exception $exception){
            DB::rollBack();
            \Log::error('offer | create | error : ' . $exception->getMessage());
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
            \Log::info('offer | update | success : ' . $offer->id);
            return $offer;
        }catch (\Exception $exception){
            DB::rollBack();
            \Log::error('offer | update | error : ' . $exception->getMessage());
            abort(500);
        }
    }
}
