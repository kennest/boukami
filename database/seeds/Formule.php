<?php

use Illuminate\Database\Seeder;

class Formule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formules')->insert([
            'label' => 'Diamant',
            'initial' => 156000,
            'gain' =>1500000,
            'delai_remboursement'=>12
        ]);
        DB::table('formules')->insert([
            'label' => 'Or',
            'initial' => 125000,
            'gain' =>1200000,
            'delai_remboursement'=>10
        ]);
        DB::table('formules')->insert([
            'label' => 'Argent',
            'initial' => 64000,
            'gain' =>600000,
            'delai_remboursement'=>8
        ]);
        DB::table('formules')->insert([
            'label' => 'Bronze',
            'initial' => 32000,
            'gain' =>300000,
            'delai_remboursement'=>4
        ]);
    }
}
