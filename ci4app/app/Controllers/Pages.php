<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $faker = \Faker\Factory::create();
        dd($faker->name);
        $data = [
            'tittle' => 'Home | HardwareStore'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'tittle' => 'About Us | HardwareStore'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'tittle' => 'Contact | HardwareStore',
            'name' => 'Bobby',
            'email' => 'wijayakusumasandi@gmail.com',
            'telp' => '081945795745',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Raya Darmasaba, Abiansemal, Badung',
                    'provinsi' => 'Bali'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Bypass Ngurah Rai, Kuta, Badung',
                    'provinsi' => 'Bali'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }

    //--------------------------------------------------------------------

}
