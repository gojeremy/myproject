<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class SaveController extends BaseController
{
    public function __invoke(Request $request)
    {
        // Получаем все данные из запроса
        $requestData = $request->all();

        // Логируем все данные запроса
        Log::info('Все данные запроса: ' . json_encode($requestData));

        // Проверяем наличие данных в запросе
        if (!empty($requestData)) {
            // Формируем массив данных для сохранения
            $data = [
                'author' => $requestData['author'] ?? null,
                'title' => $requestData['title'],
                'description' => $requestData['description'],
                'url' => $requestData['url'],
                'urlToImage' => $requestData['urlToImage'],
                'content' => $requestData['content'],
                'source_id' => $requestData['source']['id'] ?? null,
                'source_name' => $requestData['source']['name'] ?? null,
            ];

            // Вызываем метод сервиса для сохранения данных
            try {
                // Отправка данных в ваш сервис
                $this->service->store($data);
                Log::info('Данные успешно сохранены');
                return response()->json(['message' => 'Статья успешно сохранена'], 200);
            } catch (\Exception $e) {
                Log::error('Ошибка при сохранении статьи: ' . $e->getMessage());
                return response()->json(['error' => 'Ошибка при сохранении статьи'], 500);
            }
        } else {
            Log::error('Нет данных в запросе');
            return response()->json(['error' => 'Нет данных в запросе'], 400);
        }
    }
}
