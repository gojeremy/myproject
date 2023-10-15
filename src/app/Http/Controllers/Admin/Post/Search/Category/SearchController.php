<?php

namespace App\Http\Controllers\Admin\Post\Search\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use jcobhams\NewsApi\NewsApiException;

class SearchController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        try{
            $validatedData = $request->validate([
                'q' => 'nullable|string',
                'country' => 'required|string',
                'category' => 'required|string',
                'page' => 'required|integer',
                'page_size' => 'required|integer',
            ]);

            // Вы можете получить значения полей так:
            $q = $request->input('q', null);
            $country = $validatedData['country'];
            $category = $validatedData['category'];
            $page = $validatedData['page'];
            $page_size = $validatedData['page_size'];

            $newsApiKey = env('NewsApiKey');
            $newsApi = new NewsApi($newsApiKey);

            $posts = $newsApi->getTopHeadlines( $q,null, $country, $category, $page_size, $page);

            // Логируем успешный запрос
            \Log::info("Запрос новостей по категории - $category, страна - $country, ключи - $q");

            return response()->json($posts);
        }catch (NewsApiException $e) {
            // Обрабатываем исключение NewsApiException и возвращаем ошибку
            \Log::error("Ошибка при запросе источников новостей: " . $e->getMessage());
            return response()->json(['error' => 'Ошибка при запросе источников новостей'], 500);
        }
    }
}
