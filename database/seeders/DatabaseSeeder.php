<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissionNames = [
            'create team',
            'join team',
            'edit team',
            'delete team',
            'manage team staff',
            'manage team roster',
            'create tournament',
            'schedule tournament matches',
            'submit team result',
            'resolve dispute',
            'correct published result',
        ];

        $permissions = collect($permissionNames)
            ->map(fn (string $name) => Permission::firstOrCreate([
                'name' => $name,
                'guard_name' => 'web',
            ]));

        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        $adminRole->syncPermissions($permissions);

        $playerRole = Role::firstOrCreate([
            'name' => 'player',
            'guard_name' => 'web',
        ]);
        $playerRole->syncPermissions($permissions->whereIn('name', [
            'create team',
            'join team',
        ]));

        $admin = User::updateOrCreate([
            'email' => 'raoful.edu@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('12rhdipto34'),
            'email_verified_at' => now(),
        ]);
        $admin->syncRoles([$adminRole]);

        $testUser = User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => Hash::make('password'),
        ]);
        $testUser->syncRoles([$playerRole]);
    }
}
