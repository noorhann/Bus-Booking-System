<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:CrudController {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =  'Make an Controller Class';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FileSystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {    
        $path = $this->getSourceFilePath();

        $contents = $this->getSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return __DIR__ . '/../../../stubs/crud.controller.stub';
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    public function getStubVariables()
    {
        return [
            'NAMESPACE'         => 'App\Http\Controllers',
            'CLASS_NAME'        => Str::studly($this->getPluralClassName($this->argument('name'))) . 'Controller',
            'MODEL_NAME'        => $this->argument('name'),
            'PATH'              => strtolower($this->getPluralClassName($this->argument('name'))),
            'LIST_RESOURCE'     => Str::plural($this->argument('name')) . 'ListResource',
            'SINGLE_RESOURCE'   => Str::plural($this->argument('name')) . 'SingleResource',
            'CREATE_REQUEST'    => 'Create' . Str::plural($this->argument('name')) . 'Request',
            'UPDATE_REQUEST'    => 'Update' . Str::plural($this->argument('name')) . 'Request',
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return base_path('app/Http/Controllers') . '/' . Str::studly($this->getPluralClassName($this->argument('name'))) . 'Controller.php';
    }


    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Return the Plural Lower Name
     * @param $name
     * @return string
     */
    public function getPluralClassName($name)
    {
        return strtolower(Str::plural($name));
    }


}
