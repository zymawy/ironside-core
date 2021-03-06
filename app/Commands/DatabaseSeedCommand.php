<?php

namespace Zymawy\Ironside\Commands;

use Zymawy\Ironside\Seeds\DatabaseSeeder;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Artisan;

class DatabaseSeedCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'ironside:db:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database (add startup data into core tables).';

    /**
     * @var Filesystem
     */
    private $filesystem;

    private $appPath;

    private $basePath;

    // directory separator
    private $ds;

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->ds = DIRECTORY_SEPARATOR;
        $this->filesystem = $filesystem;

        $this->basePath = __DIR__ . $this->ds . '..' . $this->ds . '..' . $this->ds;
        $this->appPath = $this->basePath . "app" . $this->ds;
    }

    /**
     * Execute the command
     */
    public function handle()
    {
        $seed = new DatabaseSeeder();
        $seed->run();
        
        $this->line("Seeding: RoleTableSeeder");
        $this->line("Seeding: UserTableSeeder");
        $this->line("Seeding: BannerTableSeeder");
        $this->line("Seeding: PageTableSeeder");
        $this->line("Seeding: NavigationAdminTableSeeder");
        $this->info("Database seeding completed successfully.");

        $this->line("User Credentials");
        $this->info("Email: admin@laravel.local");
        $this->info("Password: admin");
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
    }
}
