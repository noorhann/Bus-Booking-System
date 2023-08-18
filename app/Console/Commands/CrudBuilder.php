<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CrudBuilder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:build {modelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates Full API Crud for the specified model' ; 

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // make ListResource
        Artisan::call('make:resource', [
            'name' => Str::plural($this->argument('modelName')) . 'ListResource',
        ]);

        // make SingleResource
        Artisan::call('make:resource', [
            'name' => Str::plural($this->argument('modelName')) . 'SingleResource',
        ]);

        // make CreateRequest
        Artisan::call('make:request', [
            'name' => 'Create' . Str::plural($this->argument('modelName')) . 'Request',
        ]);

        // make UpdateRequest
        Artisan::call('make:request', [
            'name' => 'Update' . Str::plural($this->argument('modelName')) . 'Request',
        ]);

        // make Controller
        Artisan::call('make:CrudController', [
            'name' => $this->argument('modelName'),
        ]);

        // make Routes
        Artisan::call('make:CrudRoutes', [
            'name' => $this->argument('modelName'),
        ]);
    }
}
