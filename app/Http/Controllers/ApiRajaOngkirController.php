<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\City;

class ApiRajaOngkirController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        if($request->destination&&$request->weight&&$request->courier){
            $origin=501;
            $destination=$request->destination;
            $weight=$request->weight;
            $courier=$request->courier;
            $nama=$request->nama;
            $response = Http::asForm()->withHeaders([
            'key'=>'9ba4b2e004a1a570147db021b777484b',

            ])->post('https://api.rajaongkir.com/starter/cost',[
                'origin'=>$origin,
                'destination'=>$destination,
                'weight'=>$weight,
                'courier'=>$courier
            ]);
            $data=$response['rajaongkir']['results'][0]['costs'];
        }else{
            $origin=501;
            $destination='';
            $weight='';
            $courier='';
            $data=null;
            $nama=null;
        }

        $province=province::all();
        return view('rajaongkir',compact('province','data','nama'));
    }
    public function data()
    {
        $origin=501;
        $destination=114;
        $weight=1700;
        $courier='jne';

        $response = Http::asForm()->withHeaders([
            'key'=>'9ba4b2e004a1a570147db021b777484b',

        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin'=>$origin,
            'destination'=>$destination,
            'weight'=>$weight,
            'courier'=>$courier
        ]);

        return $response['rajaongkir']['results'][0];

    }
    public function getDataCity($id)
    {
        // dd($id);
        $cities=City::where('province_id',$id)->pluck('city_name','id');
        return json_encode($cities);
    }
}
