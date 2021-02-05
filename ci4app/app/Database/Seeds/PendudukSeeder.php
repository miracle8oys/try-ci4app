<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class PendudukSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama' => 'Bobby Kusuma',
        //         'alamat'    => 'Jl.Raya Darmasaba, Abiansemal, Badung',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'William Tanwijaya ',
        //         'alamat'    => 'Jl.Raya Darmasaba, Abiansemal, Badung',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ]
        // ];
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 101; $i++) {


            $data = [
                'nama' => $faker->name,
                'alamat'    => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            $this->db->table('penduduk')->insert($data);
        }



        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO penduduk (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('penduduk')->insertBatch($data);
    }
}
