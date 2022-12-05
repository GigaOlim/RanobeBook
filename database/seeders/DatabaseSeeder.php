<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory(10)->create();
        Publisher::factory(10)->create();
        Author::factory(10)->create();
        $roles = Role::factory(4)->create();
        $users = User::factory(10)->create();

        foreach($users as $user) {
            $rolesIds = $roles->unique()->random(2)->pluck('id')->toArray();
            
            $user->roles()->attach($rolesIds);
        }
    }
}
