<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Administrator',
            'username' => 'admin'
        ]);

        factory(User::class)->create([
            'name' => 'Customer',
            'username' => 'customer'
        ]);

        factory(User::class)->create([
            'name' => 'Administrator 2',
            'username' => 'admin'
        ]);

        factory(User::class)->create([
            'name' => 'Customer 2',
            'username' => 'customer'
        ]);

        factory(User::class, 13);
    }
}
