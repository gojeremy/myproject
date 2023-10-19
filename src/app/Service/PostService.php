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
            Log::info('Все данные запроса: ' . json_encode($data));
            $post = Post::firstOrCreate($data);
            DB::commit();
            return $post;
        } catch (\Exception $exception){
            DB::rollBack();
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
            return $post;
        }catch (\Exception $exception){
            DB::rollBack();
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
        try {
            DB::beginTransaction();
            $imageUrl = $data['urlToImage'];
            $imagePath = $this->downloadAndSaveImage($imageUrl);

            if ($imagePath !== null) {
                $data['urlToImage'] = $imagePath;
                $post = Post::firstOrCreate($data);
                DB::commit();
            } else {
                DB::rollBack();
                abort(500); // Ошибка при загрузке или пустое изображение
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500); // Ошибка во время обработки
        }
    }
}
