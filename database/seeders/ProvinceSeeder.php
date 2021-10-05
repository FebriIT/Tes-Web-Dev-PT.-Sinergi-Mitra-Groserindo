<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key'=>'9ba4b2e004a1a570147db021b777484b'
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces= $response['rajaongkir']['results'];

        foreach($provinces as $province){
            $dataprovince[]=[
                'id'=>$province['province_id'],
                'province'=>$province['province'],
            ];
        }
        Province::insert($dataprovince);
    }
}
