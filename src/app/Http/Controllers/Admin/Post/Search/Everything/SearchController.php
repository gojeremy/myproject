<?php

namespace App\Http\Controllers\Admin\Post\Search\Everything;

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
                'sources' => 'nullable|array',
                'page' => 'nullable|integer',
                'page_size' => 'nullable|integer',
                'language' => 'nullable|string',
                'sort_by' => 'required|string',
            ]);

            // Вы можете получить значения полей так:
            $q = $request->input('q', null);
            $sources = $request->input('sources', null);

            if (is_array($sources)) {
                if (count($sources) === 1) {
                    // Если в массиве только один элемент, преобразуем его в строку
                    $sources = $sources[0];
                } elseif (count($sources) > 1) {
                    // Если в массиве больше одного элемента, объединяем их в строку через запятую
                    $sources = implode(',', $sources);
                }
            }

            $sourcesJson = json_encode($sources);
            $page = $request->input('page', null);
            $page_size = $request->input('page_size', 30);
            $language = $request->input('language', null);
            $sort_by = $validatedData['sort_by'];

            $newsApiKey = env('NewsApiKey');
            $newsApi = new NewsApi($newsApiKey);
            $posts = $newsApi->getEverything($q,$sources, null, null, null, null, $language, $sort_by, $page_size, $page);

            // Логируем успешный запрос
            \Log::info("Запрос новостей всех подряд по ресурсам - $sourcesJson, ключи - $q");
            return response()->json($posts);
        }catch (NewsApiException $e) {
            // Обрабатываем исключение NewsApiException и возвращаем ошибку
            \Log::error("Ошибка при запросе источников новостей: " . $e->getMessage());
            return response()->json(['error' => 'Ошибка при запросе источников новостей'], 500);
        }
    }
}
