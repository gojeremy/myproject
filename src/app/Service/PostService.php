<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class PostService
{
    public function store($data)
    {
        try{
            DB::beginTransaction();
            if(!empty($data['urlToImage'])){
                $data['urlToImage'] = Storage::disk('public')->put('/images', $data['urlToImage']);
            }
            $post = Post::firstOrCreate($data);
            DB::commit();
            \Log::info('article | create | success : ' . $post->id);
            return $post;
        } catch (\Exception $exception){
            DB::rollBack();
            \Log::error('article | create | error : ' . $exception->getMessage());
            abort(500);
        }
    }
    public function update($data, $post){
        try{
            DB::beginTransaction();
            if(!empty($data['urlToImage'])){
                $data['urlToImage'] = Storage::disk('public')->put('/images', $data['urlToImage']);
            }
            $post->update($data);
            DB::commit();
            \Log::info('offer | update | success : ' . $post->id);
            return $post;
        }catch (\Exception $exception){
            DB::rollBack();
            \Log::error('article | update | error : ' . $exception->getMessage());
            abort(500);
        }

      //  return $post;
    }
    public function downloadAndSaveImage($imageUrl)
    {
        $client = new Client();
        $response = $client->get($imageUrl);

        if ($response->getStatusCode() === 200) {
            $imageContents = $response->getBody();

            if (!empty($imageContents)) {
                $fileName = md5($imageUrl) . '.jpg';
                $path = 'images/' . $fileName;
                Storage::disk('public')->put($path, $imageContents);
                return $path;
            }
        }

        return null;
    }

    public function save($data)
    {
        try{
            DB::beginTransaction();
            if (!empty($data['urlToImage'])) {
            $data['urlToImage'] = $this->downloadAndSaveImage($data['urlToImage']);
            }
            $post = Post::firstOrCreate($data);
            DB::commit();
            \Log::info('post | update | success : ' . $post->id);
        }catch (\Exception $exception){
            DB::rollBack();
            \Log::error('article | save | error : ' . $exception->getMessage());
            abort(500);
        }
    }
}
