<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\City;

class CitySeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities=$response['rajaongkir']['results'];

        foreach($cities as $city){
            $datacity[]=[
                'id'=>$city['city_id'],
                'province_id'=>$city['province_id'],
                'type'=>$city['type'],
                'city_name'=>$city['city_name'],
                'postal_code'=>$city['postal_code'],
            ];
        }
        City::insert($datacity);
    }
}
