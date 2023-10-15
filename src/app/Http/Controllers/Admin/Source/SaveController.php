<?php

namespace App\Http\Controllers\Admin\Source;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaveController extends BaseController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            // Получение данных из запроса
            $idName = $request->input('idName');
            $name = $request->input('name');

            // Валидация данных, если необходимо
            $validatedData = $request->validate([
                'idName' => 'required|string',
                'name' => 'required|string',
            ]);

            // Отправка данных в ваш сервис
            $this->service->store($validatedData);

            // Логирование успешного запроса
            \Log::info("Запрос создания источников новостей: успех");

            return response()->json($validatedData);
        } catch (\Exception $e) {
            // Обработка ошибки и возврат ошибки в случае неудачи
            \Log::error("Ошибка при запросе создания источника новостей: " . $e->getMessage());
            return response()->json(['error' => 'Ошибка при запросе создания источника новостей'], 500);
        }
        }
    }
