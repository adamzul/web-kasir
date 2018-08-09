<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MakananMinuman;
use Illuminate\Support\Facades\Auth;
use Validator;

class MakananMinumanController extends Controller
{
    public $successStatus = 200;

    public function makananMinuman(){
        $makananMinuman = MakananMinuman::all();
        $success['makanan_minuman'] =  $makananMinuman;
            return response()->json(['success' => $success], $this->successStatus);
        
    }
}
