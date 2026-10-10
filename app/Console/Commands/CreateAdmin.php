<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdmin extends Command
{
    protected $signature = 'app:create-admin';

    protected $description = 'Create or promote a global administrator';

    public function handle(): int
    {
        $email = strtolower(trim($this->ask('Admin email')));
        $user = User::where('email', $email)->first();
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        if ($user) {
            if (! $this->confirm("Assign the admin role to {$user->email}?", true)) {
                $this->info('No changes made.');

                return self::SUCCESS;
            }

            $user->assignRole($adminRole);
            $this->info('The existing user is now an administrator.');

            return self::SUCCESS;
        }

        $name = trim($this->ask('Admin name'));
        $password = $this->secret('Admin password (minimum 12 characters)');
        $passwordConfirmation = $this->secret('Confirm admin password');

        if (strlen($password) < 12 || $password !== $passwordConfirmation) {
            $this->error('Passwords must match and contain at least 12 characters.');

            return self::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $user->assignRole($adminRole);
        $this->info("Administrator {$user->email} created successfullEy.");

        return self::SUCCESS;
    }
}