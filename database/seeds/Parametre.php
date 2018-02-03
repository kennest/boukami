<?php

use Illuminate\Database\Seeder;

class Parametre extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametres')->insert([
            'niveau_courant' => 0,
            'vmax' => 1,
            'dernier_code' =>null
        ]);
    }
}
