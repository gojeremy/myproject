<?php

namespace App\Http\Controllers\Admin\Source;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use jcobhams\NewsApi\NewsApiException;
use Illuminate\Support\Facades\Log;

class FindController extends BaseController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try{
        $validatedData = $request->validate([
            'category' => 'required|string',
            'country' => 'required|string',
            'language' => 'required|string',
        ]);

        // Вы можете получить значения полей так:
        $category = $validatedData['category'];
        $country = $validatedData['country'];
        $language = $validatedData['language'];

        $apiKey = env('NewsApiKey');
        $newsApi = new NewsApi($apiKey);

        $sources = $newsApi->getSources($category, $language, $country);

        // Логируем успешный запрос
            \Log::info("source | request | success : Категория - $category, Страна - $country, Язык - $language");

            return response()->json($sources);
        }catch (NewsApiException $e) {
            // Обрабатываем исключение NewsApiException и возвращаем ошибку
            \Log::error("Ошибка при запросе источников новостей: " . $e->getMessage());
            return response()->json(['error' => 'Ошибка при запросе источников новостей'], 500);
        }
        }
    }
