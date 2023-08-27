<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserCommand extends Command
{
    protected $signature = 'user:make';

    protected $description = 'Create new user';

    public function handle(): int
    {
        $email = $this->ask('Email');
        User::factory()->create([
            'email' => $email
        ]);
        return self::SUCCESS;
    }

}
