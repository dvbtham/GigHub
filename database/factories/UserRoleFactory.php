<?php

use Faker\Generator as Faker;
use Database\Helpers\QueryBuilderHelper as qbh;

$factory->define(App\Models\UserRole::class, function (Faker $faker) {

    $user_id = qbh::getTableId('users', 'id');
    $role_id = qbh::getTableId('roles', 'id');

    while(isUniqueUserRole($role_id, $user_id) > 0)
    {
        $user_id = qbh::getTableId('users', 'id');
        $role_id = qbh::getTableId('roles', 'id');
    }

    return [
        'user_id' => $user_id,
        'role_id' => $role_id,
    ];
});

function isUniqueUserRole($role_id, $user_id){

    return DB::table('user_roles')->where('user_id', '=', $user_id)
                           ->where('role_id', '=', $role_id)->count();
}
