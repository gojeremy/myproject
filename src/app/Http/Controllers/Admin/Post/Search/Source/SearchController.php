<?php

namespace App\Http\Controllers\Admin\Post\Search\Source;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use jcobhams\NewsApi\NewsApiException;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try{
            $validatedData = $request->validate([
                'q' => 'nullable|string',
                'source' => 'nullable|string',
                'page' => 'nullable|integer',
                'page_size' => 'nullable|integer',
            ]);

            // Вы можете получить значения полей так:
            $q = $request->input('q', null);
            $source = $request->input('source', null);
            $sourcesJson = json_encode($source);
            $page = $request->input('page', null);
            $page_size = $request->input('page_size', null);

            $newsApiKey = env('NewsApiKey');
            $newsApi = new NewsApi($newsApiKey);

            $posts = $newsApi->getTopHeadlines( $q,$source, null, null, $page_size, $page);
            // Логируем успешный запрос
            \Log::info("Запрос новостей по ресурсам - $sourcesJson, ключи - $q");

            return response()->json($posts);
        }catch (NewsApiException $e) {
            \Log::error("Ошибка при запросе источников новостей: " . $e->getMessage());
            return response()->json(['error' => 'Ошибка при запросе источников новостей'], 500);
        }
    }
}
