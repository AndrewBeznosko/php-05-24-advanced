<?php

namespace App\Commands\Seeds;

use App\Commands\Command;
use App\Models\Folder;
use App\Models\User;
use CliHelper;

class FolderSeed implements Command
{
    const MIGRATIONS_DIR = BASE_DIR . '/migrations';

    public function __construct(public CliHelper $cliHelper, public array $args = [])
    {
    }

    public function handle(): void
    {
        $min = $this->args[0] ?? 1;
        $max = $this->args[1] ?? 10;

        if ($min > $max) {
            $this->cliHelper->error('Min value must be less than max value!');
            return;
        }

        $users = User::all();

        foreach ($users as $user) {
            $count = rand($min, $max);

            for ($i = 0; $i < $count; $i++) {
                $user = Folder::create([
                    'title' => "User $user->id Folder $i",
                    'user_id' => $user->id,
                ]);

                $this->cliHelper->info("Folder with id: $user->id was created!");
            }
        }
    }
}
