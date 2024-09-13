<?php

namespace App\Jobs;

//очередь

use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddCarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $carData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $carData)
    {
        $this->carData = $carData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Car::create($this->carData);
    }
}
