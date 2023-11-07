<?php

namespace App\Service;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    public function store($data)
    {
        try{
            DB::beginTransaction();

            $category = Category::firstOrCreate($data);
            DB::commit();
            \Log::info('category | create | success : ' . $category->id);
            return $category;
        } catch (\Exception $exception){
            DB::rollBack();
            \Log::error('category | create | error : ' . $exception->getMessage());
            abort(500);
        }
    }
    public function update($data, $category){
        try{
            DB::beginTransaction();
            $category->update($data);
            DB::commit();
            \Log::info('category | update | success : ' . json_encode($data));
            return $category;
        }catch (\Exception $exception){
            DB::rollBack();
            \Log::error('category | update | error : ' . $exception->getMessage());
            abort(500);
        }
    }
}
