<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        if (!$this->checkSuperadminExist($user)) {
            $user->create([
                'name' => 'Superadmin',
                'username' => 'superadmin',
                'email' => 'superadmin@mail.com',
                'password' => Hash::make('superadmin'),
                'is_active' => true,
                'is_superadmin' => true,
            ]);
        }
    }

    private function checkSuperadminExist($user): bool
    {
        return $user->where(['is_superadmin' => true, 'username' => 'superadmin', 'is_active' => true])->count() > 0;
    }
}
