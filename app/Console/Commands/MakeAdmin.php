<?php

namespace App\Console\Commands;

use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Write your name');
        $email = $this->ask('wirte an email');
        $pass = $this->ask('create a password');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $pass,
        ]);

        RoleUser::create([
            'role_id' => '1',
            'user_id' => "$user->id",
        ]);

        // User::create(['']);
    }
}
