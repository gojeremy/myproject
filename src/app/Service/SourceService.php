<?php

namespace App\Service;

use App\Models\Source;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SourceService
{
    public function store($data){
        try{
            DB::beginTransaction();
            $source = Source::firstOrCreate($data);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $source){
        try{
            DB::beginTransaction();
            $source->update($data);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $source;
    }
}
