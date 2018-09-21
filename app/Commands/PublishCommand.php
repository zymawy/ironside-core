<?php

namespace Bpocallaghan\Titan\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Finder\SplFileInfo;

class PublishCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'titan:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy the [type] related files to your laravel app.';

    /**
     * @var Filesystem
     */
    private $filesystem;

    private $basePath;

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->filesystem = $filesystem;

        $this->basePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    }

    /**
     * Execute the command
     */
    public function handle()
    {
        $filesToPublish = $this->option('files');

        switch ($filesToPublish) {
            case 'database':
                $this->copyDatabase();
                break;
        }

        //$this->info("The stubs have been copied to 'asd'.");

        //$this->copyConfigFile();
        //$this->copyStubsDirectory();
        //$this->updateStubsPathsInConfigFile();

        //$this->info("The config file has been copied to '" . $this->getConfigPath() . "'.");
        //$this->info("The stubs have been copied to '{$this->option('path')}'.");
    }

    /**
     * Copy the database files
     */
    private function copyDatabase()
    {
        // get all files in database/migrations and database/seeds
        // if one already exist in desired location
        // flag and ask to override or not

        $sourceDatabase = $this->basePath . "database" . DIRECTORY_SEPARATOR;
        $destinationMigrations = database_path('migrations');
        $destinationSeeds = database_path('seeds');
        $destinationCSV = database_path('seeds' . DIRECTORY_SEPARATOR . 'csv');

        dump($sourceDatabase);
        dump($destinationMigrations);
        dump($destinationSeeds);
        dump($destinationCSV);

        // copy files from source to destination
        $this->copyFilesFromSource($sourceDatabase . 'migrations', $destinationMigrations);
        $this->copyFilesFromSource($sourceDatabase . 'seeds', $destinationSeeds);
        $this->copyFilesFromSource($sourceDatabase . 'seeds' . DIRECTORY_SEPARATOR . 'csv', $destinationCSV);
    }

    /**
     * Copy files from the source to destination
     * @param $source
     * @param $destination
     */
    private function copyFilesFromSource($source, $destination)
    {
        $source .= DIRECTORY_SEPARATOR;
        $destination .= DIRECTORY_SEPARATOR;
        $files = collect($this->filesystem->files($source));

        // can we override the existing files or not
        $override = $this->overrideExistingFiles($files, $destination);

        $this->info("Destination: {$destination}");

        // loop through all files and copy file to destination
        $files->map(function (SplFileInfo $file) use ($source, $destination, $override) {

            $fileSource = $source . $file->getFilename();
            $fileDestination = $destination . $file->getFilename();

            //dump("$fileSource");
            //if (!$this->filesystem->exists($fileSource)) {
            //    dump("file does not exist? " . $fileSource);
            //    return;
            //}

            // make all the directories
            $this->makeDirectory($fileDestination);

            // if not exist or if we can override the files
            if ($this->filesystem->exists($fileDestination) == false || $override == true) {
                $this->filesystem->copy($fileSource, $fileDestination);
                $this->info("File copied: {$file->getFilename()}");
            }
            //dump($file->getFilename());
        });
    }

    /**
     * See if any files exist
     * Ask to override or not
     * @param Collection $files
     * @param            $destination
     * @return bool
     */
    private function overrideExistingFiles(Collection $files, $destination)
    {
        $answer = true;
        $filesFound = [];
        // map over to see if same filename already exist in destination
        $files->map(function (SplFileInfo $file) use ($destination, &$filesFound) {
            if ($this->filesystem->exists($destination . $file->getFilename())) {
                $filesFound [] = $file->getFilename();
            }
        });

        // if files found
        if (count($filesFound) >= 1) {
            dump($filesFound);

            $this->info("Destination: " . $destination);
            $answer = $this->confirm("Above is a list of the files already exist. Override all files?");
        }

        return $answer;
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->filesystem->isDirectory(dirname($path))) {
            $this->filesystem->makeDirectory(dirname($path), 0777, true, true);
        }

        return $path;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            [
                'files',
                null,
                InputOption::VALUE_OPTIONAL,
                'Which files must be published (database, app, assets, views)?',
                'all'
            ],
        ];
    }
}