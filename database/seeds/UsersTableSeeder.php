<?php

use Illuminate\Database\Seeder;
use Database\Helpers\QueryBuilderHelper as qbh;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_from_db = DB::table('roles')->select('id')->get();

        $role_ids = [];

        foreach($ids_from_db as $id)
            $role_ids[] = $id->id;

        $users = factory(App\Models\User::class, 3)->create();

        foreach ($users as $user) {
            $user->roles()->attach($role_ids);
        }
    }
}
