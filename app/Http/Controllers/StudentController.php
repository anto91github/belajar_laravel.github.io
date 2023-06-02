<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index(Request $request) 
    {
        $name = 'budi';

        // eloquet

        // Student::create([
        //     'name' => 'elo',
        //     'gender' => 'L',
        //     'nis' => '112',
        //     'class_id' => 1
        // ]);

        // Student::find(1)
        //         ->update(['name' => 'Eloquent_updated']);

        // Student::find(26)->delete();
        
        // $student = Student::all();
        // $student = Student::with(['class1.homeroomTeacher','ekskuls'])->get();

        $keyword = $request->keyword;
        $student = Student::with(['class1.homeroomTeacher','ekskuls'])
                ->where('name','LIKE', '%'.$keyword.'%')
                ->orWhere('gender', $keyword)
                ->orWhere('nis','LIKE', '%'.$keyword.'%')
                ->orWhereHas('class1', function($query) use($keyword){
                    $query->where('name','LIKE', '%'.$keyword.'%');
                })
                ->paginate(15);
        // dd($student);
        

        // query builder

        // DB::table('students')->insert([
        //     'name' => 'query_builder',
        //     'gender' => 'L',
        //     'nis' => '111',
        //     'class_id' => 1
        // ]);

        // DB::table('students')
        //       ->where('id', 1)
        //       ->update(['name' => 'wasd1']);

        // $deleted = DB::table('students')->where('id', 27)->delete();

        // $student = DB::table('students')->get();
        
        
 
        
        return view('student',
            ['studentList' => $student]
        );
    }

    public function show($id)
    {
        $student = Student::with(['ekskuls', 'class1.homeroomTeacher'])->findOrFail($id);

        return view('student-detail',
            ['studentDetail' => $student]
        );
    }

    public function create()
    {
        $class = ClassRoom::all();
        return view('student-add', ['classList'=>$class]);
    }

    public function store(StudentCreateRequest $request)
    {
        /*$student = new Student;
 
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->nis = $request->nis;
        $student->class_id = $request->class_id;
 
        $student->save();*/

        /*$student = Student::create([
            'name' => $request->name,
        ]);*/

        // $validated = $request->validate([
        //     'nis' => 'unique:students|max:10',
        //     'name' => 'max:5|required'
        // ]);
        $newName = '';
        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            
            $request->file('photo')->storeAs('student_photo', $newName);
        }

        $request['image'] = $newName;
        $student = Student::create($request->all());

        if($student){
            Session::flash('status', 'success');
            Session::flash('message', 'add new student success');
        }
        
        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class1')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id','name']);
        return view('student-edit', ['studentDetail' => $student, 'classList' => $class]);
    }

    public function update(Request $request, $id)
    {
        Student::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'nis' => $request->nis,
                    'class_id' => $request->class_id,
                ]);
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        $delete = Student::findOrFail($id);
        $delete->delete();

        if($delete){
            Session::flash('status', 'success');
            Session::flash('message', 'Delete student success');
        }
        return redirect('/students');
    }

    public function deletedStudent()
    {
        $studentDeleted = Student::onlyTrashed()->get();
        return view('student-deleted-list', ['studentDeleted' => $studentDeleted]);
    }

    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()
        ->where('id', $id)
        ->restore();

        if($deletedStudent){
            Session::flash('status', 'success');
            Session::flash('message', 'Restore student success');
        }

        return redirect('/students');
    }
}
