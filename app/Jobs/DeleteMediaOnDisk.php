<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DeleteMediaOnDisk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $model;
    public $collection;
    public $modelId;

    public function __construct($model,string $collection, int $modelId)
    {
        $this->model = $model;
        $this->collection = $collection;
        $this->modelId = $modelId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $files          = Storage::files($this->model . '/' . $this->collection . '/' . $this->modelId);


        if ($files) {
            foreach ($files as $item) {
                Storage::delete($item);
            }

            Storage::deleteDirectory($this->model . '/' . $this->collection . '/' . $this->modelId);
        }
    }
}
