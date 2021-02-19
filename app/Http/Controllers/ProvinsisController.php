<?php

namespace App\Http\Controllers;

use App\Models\Provinsis;
use App\Models\Kotas;
use Illuminate\Http\Request;

class ProvinsisController extends Controller
{
    public function index(){

        //  Provinsi
        $provinsiData['data'] = Provinsis::orderby("provinsi","asc")
        			   ->select('id','provinsi')
        			   ->get();

        // Load index view
    	return view('index')->with("provinsiData",$provinsiData);
    }

    //  records
    public function getKotas($provinsiid=0){

        // Fetch Kota by provinsiid
        $empData['data'] = Kotas::orderby("kota","asc")
                    ->select('id','kota')
                    ->where('provinsi',$provinsiid)
                    ->get();
  
        return response()->json($empData);
     
    }

}