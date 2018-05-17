<?php

use Illuminate\Database\Seeder;

class GigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Gig::class, 10)->create();
    }
}
