<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRolesEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // run location seeder
        $this->call([
            LocationSeeder::class,
        ]);

        $userroles = [
            [
                'id' => UserRolesEnum::Customer,
                'name' => 'Customer',
                'status' => true,
            ],
            [
                'id' => UserRolesEnum::Employee,
                'name' => 'Employee',
                'status' => true,
            ],
            [
                'id' => UserRolesEnum::Admin,
                'name' => 'Admin',
                'status' => true,
            ]

        ];

        foreach ($userroles as $role) {
            \App\Models\Role::create($role);
        }

        // Create admin user
        \App\Models\User::create([
            'name' => 'Admin ',
            'email' => 'admin@badmintonfield.com',
            'password' => Hash::make('adminbulutangkis123'),
            'phone_number' => '1234569990',
            'role_id' => UserRolesEnum::Admin,
        ]);

        // create mock customers
        \App\Models\User::create([
            'name' => 'Pelanggan 1',
            'email' => 'pelanggan1@gmail.com',
            'password' => Hash::make('pwpelanggan1'),
            'phone_number' => '1299567890',
            'role_id' => UserRolesEnum::Customer,
        ]);

        \App\Models\User::create([
            'name' => 'Pelanggan 2',
            'email' => 'Pelanggan2@gmail.com',
            'password' => Hash::make('pwpelanggan2'),
            'phone_number' => '1277567890',
            'role_id' => UserRolesEnum::Customer,
        ]);

        \App\Models\User::create([
            'name' => 'Pelanggan 3',
            'email' => 'Pelanggan3@gmail.com',
            'password' => Hash::make('pwpelanggan3'),
            'phone_number' => '1234998890',
            'role_id' => UserRolesEnum::Customer,
        ]);

        // this customer is suspeneded
        \App\Models\User::create([
            'name' => 'Pelanggan 4',
            'email' => 'Pelanggan4@gmail.com',
            'password' => Hash::make('pwpelanggan4'),
            'phone_number' => '2224262890',
            'role_id' => UserRolesEnum::Customer,
            'status' => '0',
        ]);



        // create mock employees
        \App\Models\User::create([
            'name' => ' Karyawan 1',
            'email' => 'Karyawan@badmin.com',
            'password' => Hash::make('karyawan123'),
            'phone_number' => '1644567890',
            'role_id' => UserRolesEnum::Employee,
        ]);

        \App\Models\User::create([
            'name' => 'Karyawan 2',
            'email' => 'Karyawan@badmin.com',
            'password' => Hash::make('Karyawan234'),
            'phone_number' => '1234523890',
            'role_id' => UserRolesEnum::Employee,
        ]);

        // this Employee is suspeneded
        \App\Models\User::create([
            'name' => 'Karyawan 3',
            'email' => 'karyawan3@gmail.com',
            'password' => Hash::make('Karyawan345'),
            'phone_number' => '0034567890',
            'role_id' => UserRolesEnum::Employee,
            'status' => '0',
        ]);

        // Deals
        \App\Models\Deal::create([
            'name' => 'Deal 1',
            'description' => 'Deal 1 description',
            'start_date' => '2023-07-16',
            'end_date' => '2023-07-20',
            'discount' => '10',
            'is_hidden' => '0',
        ]);

        // categories Skin, Makeup, Nails, Hair
        \App\Models\Category::create([
            'name' => 'Skin',
        ]);

        \App\Models\Category::create([
            'name' => 'Makeup',
        ]);

        \App\Models\Category::create([
            'name' => 'Hair',
        ]);

        \App\Models\Category::create([
            'name' => 'Nails',
        ]);

        $this->call([
            ServicesSeeder::class,
            TimeSlotSeeder::class,
        ]);


    }
}
