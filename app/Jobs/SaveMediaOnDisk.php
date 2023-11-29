<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SaveMediaOnDisk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $items;
    public $model;
    public $collection;
    public $modelId;
    public function __construct(array $items, $model, string $collection, int $modelId)
    {
        $this->items = $items;
        $this->model = $model;
        $this->collection = $collection;
        $this->modelId = $modelId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($this->items as $item){

            Storage::move('livewire-tmp'.'/'.$item,$this->model.'/'.$this->collection.'/'.$this->modelId.'/'.$item);
        }
    }
}
