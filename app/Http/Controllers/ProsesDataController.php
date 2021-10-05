<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;

class ProsesDataController extends Controller
{
    public function index()
    {
        $data=Hasil::orderBy('id','desc')->get();
        return view('welcome',compact('data'));
    }
    public function proses(Request $request)
    {
        $countoutput=Hasil::where('output','Pasar 20 Belanja Pangan')->count();
        // dd($countoutput);
        $nilai=$request->nilai;
        if($countoutput<5){
            if($countoutput<=2){
                for ($i= 1; $i <= $nilai; $i++) {
                    if ( $bagi = $i % 3 == 0 and  $i % 5 == 0 and $i==$nilai  ) {
                        $output='Pasar 20 Belanja Pangan';
                    }elseif ( $bagi = $i % 3 == 0 and $i==$nilai ) {
                        $output='Pasar 20';
                    }elseif($bagi = $i % 5 == 0 and $i==$nilai){
                        $output='Belanja pangan';
                    }
                }
            }else{
                for ($i= 1; $i <= $nilai; $i++) {
                    if ( $bagi = $i % 3 == 0 and  $i % 5 == 0 and $i==$nilai  ) {
                        $output='Pasar 20 Belanja Pangan';
                    }elseif ( $bagi = $i % 3 == 0 and $i==$nilai ) {
                        $output='Belanja pangan';
                    }elseif($bagi = $i % 5 == 0 and $i==$nilai){
                        $output='Pasar 20';
                    }else{
                        $output='data bukan kelipatan 3 dan 5';
                    }
                }
            }
            $data=new Hasil;
            $data->nilai=$nilai;
            $data->output=$output;
            $data->save();
            return redirect()->back()->with('sukses','Data Berhasil Ditambah');
        }else{
            return redirect()->back()->with('gagal','Data Gagal Ditambah');
        }
    }

    public function destroy()
    {
        $data=Hasil::query()->delete();
        return redirect()->back();
    }
}
