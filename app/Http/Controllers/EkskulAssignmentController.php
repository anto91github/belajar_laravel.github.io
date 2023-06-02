<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentEkskul;

class EkskulAssignmentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        $ekskul = Ekskul::all();
        return view('ekskul-asignment', 
                    [
                        'student'=> $student,
                        'ekskul'=> $ekskul
                    ]
                );
    }

    public function assign(Request $request)
    {
        // dd($request);
        foreach($request->student_name as $i => $item) {
            $student = StudentEkskul::create(
                [
                    'student_id' => $request->student_name[$i],
                    'ekskul_id' => $request->ekskul[$i],
                    'price' => $request->price[$i],
                ]
            );
        }
        return redirect('/ekskul-asig');
        
    }
}
