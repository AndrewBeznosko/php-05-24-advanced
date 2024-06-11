<?php

namespace App\Commands;

use Command;

class MIgrationCreate implements Command
{
    const MIGRATIONS_DIR = BASE_DIR . '/migrations';

    public function __construct(public CliHelper $cliHelper, public array $args = [])
    {
        $this->cliHelper = $cliHelper;
        $this->args = $args;
    }

    public function handle()
    {
        $this->createDir();
        $this->createMigration();
    }

    protected function createDir()
    {
        if (!is_dir(self::MIGRATIONS_DIR)) {
            mkdir(self::MIGRATIONS_DIR);
        }
    }

    protected function createMigration()
    {
        $name = time() . '_' . $this->args[0];
        $this->cliHelper->info('Creating migration ' . $name);

        if (file_put_contents(self::MIGRATIONS_DIR . '/' . $name . '.php', '') === false) {
            $this->cliHelper->error('Error creating migration');
        }
    }
}