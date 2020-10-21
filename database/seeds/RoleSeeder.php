<?php

use App\Entities\Role;
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
            'description' => 'admin'
        ]);

        factory(User::class)->create([
            'name' => 'Customer',
            'description' => 'customer'
        ]);
        
        factory(User::class, 13);
    }
}
