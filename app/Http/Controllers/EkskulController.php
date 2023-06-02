<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskul = Ekskul::with('students')->get();

        return view('ekskul',
            ['ekskulList' => $ekskul]
        );
    }

    public function show($id)
    {
        $ekskul = Ekskul::with('students')->findOrFail($id);

        return view('ekskul-detail',
            ['ekskulList' => $ekskul]
        );
    }

    public function getPrice(Request $request)
    {
        
        $ekskul = Ekskul::findOrFail($request->id_ekskul);
        return response()->json(array('ekskul_list'=>$ekskul,'msg'=> 'sukses'), 200);
        
    }
}
