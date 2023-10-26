<?php

namespace App\Jobs;

use App\Service\PostService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SavePostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(PostService $postService)
    {
        try {
            $postService->save($this->data);
            // Додайте логування для успішного виконання роботи
            Log::info('article | save | success [JOB]:', ['data' => $this->data]);
        } catch (\Exception $e) {
            // Додайте логування для помилок
            Log::error('article | save | error [JOB]: ' . $e->getMessage(), ['data' => $this->data]);
        }
    }
}
