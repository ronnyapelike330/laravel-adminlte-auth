<?php

namespace chamikasamaraweera\AdminLteAuth\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class UiCommand extends Command
{
    protected $signature = 'ui:adminlte
                            {--auth : Scaffold the auth views}
                            {--views : Only publish the view stubs}';

    protected $description = 'Scaffold AdminLTE Bootstrap 5 auth views';

    public function __construct(protected Filesystem $files)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        if (! $this->option('auth') && ! $this->option('views')) {
            $this->error('Please specify --auth or --views option.');
            $this->line('  Example: <info>php artisan ui:adminlte --auth</info>');
            return;
        }

        if ($this->option('auth') || $this->option('views')) {
            $this->publishViews();
        }

        $this->info('AdminLTE auth scaffolding installed successfully.');
        $this->line('');
        $this->comment('Next steps:');
        $this->line('  1. Run: <info>composer require laravel/ui</info> (if not already)');
        $this->line('  2. Run: <info>php artisan ui:auth</info> (for routes & controllers)');
        $this->line('  3. Include AdminLTE 3.x & Bootstrap 5 in your layout');
        $this->line('     CDN or npm: https://adminlte.io/docs/3.2/');
    }

    protected function publishViews(): void
    {
        $stubsPath = __DIR__ . '/../Stubs';
        $viewsPath = resource_path('views');

        $map = [
            // Layouts
            "$stubsPath/layouts/auth.blade.php"           => "$viewsPath/layouts/auth.blade.php",

            // Auth views
            "$stubsPath/auth/login.blade.php"             => "$viewsPath/auth/login.blade.php",
            "$stubsPath/auth/register.blade.php"          => "$viewsPath/auth/register.blade.php",
            "$stubsPath/auth/verify.blade.php"            => "$viewsPath/auth/verify.blade.php",

            // Password views
            "$stubsPath/auth/passwords/email.blade.php"   => "$viewsPath/auth/passwords/email.blade.php",
            "$stubsPath/auth/passwords/reset.blade.php"   => "$viewsPath/auth/passwords/reset.blade.php",
            "$stubsPath/auth/passwords/confirm.blade.php"   => "$viewsPath/auth/passwords/confirm.blade.php",
        ];

        foreach ($map as $from => $to) {
            $dir = dirname($to);

            if (! $this->files->isDirectory($dir)) {
                $this->files->makeDirectory($dir, 0755, true);
            }

            if ($this->files->exists($to) && ! $this->confirm("File [{$to}] already exists. Overwrite?")) {
                $this->line("<comment>Skipped:</comment> $to");
                continue;
            }

            $this->files->copy($from, $to);
            $this->line("<info>Published:</info> $to");
        }
    }
}