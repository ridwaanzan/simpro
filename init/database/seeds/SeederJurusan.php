<?php

use Illuminate\Database\Seeder;

class SeederJurusan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = array(
            ['id'=>1, 'nama'=>'Teknik Industri'],
            ['id'=>2, 'nama'=>'Teknik Informatika'],
            ['id'=>3, 'nama'=>'Sistem Informasi'],
            ['id'=>4, 'nama'=>'Teknik Mesin']
        );

        DB::table('jurusans')->insert($jurusan);
    }
}
