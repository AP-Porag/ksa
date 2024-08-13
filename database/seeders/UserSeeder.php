<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utils\GlobalConstant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name'        => 'Supper',
                'last_name'         => 'Admin',
                'username'         => 'supperadmin',
                'email'             => 'admin@app.com',
                'email_verified_at' => now(),
                'password'          => Hash::make("12345678"),   // 12345678
                'user_type'         => User::USER_TYPE_ADMIN,
                'status'            => GlobalConstant::STATUS_ACTIVE,
                'remember_token'    => Str::random(60),
                'phone'             => '012345678910',
                'date_of_hire'     => '2000-10-21',
            ],
            [
                'first_name'        => 'KSA',
                'last_name'         => 'Last',
                'username'         => 'KSAlast',
                'email'             => 'ksa@app.com',
                'email_verified_at' => now(),
                'password'          => Hash::make("12345678"),   // 12345678
                'user_type'         => User::USER_TYPE_KSA,
                'status'            => GlobalConstant::STATUS_ACTIVE,
                'remember_token'    => Str::random(60),
                'phone'             => '012345678910',
                'date_of_hire'     => '2000-10-22',
            ],
        ];

        $role = Role::create(['name' => 'Super Admin']);
        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        foreach ($users as $user) {
            $user = User::create($user);
            $user->assignRole([$role->id]);
        }

    }
}
