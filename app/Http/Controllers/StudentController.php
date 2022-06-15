<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index',[
            'students' => Student::get()
        ]);
    }
    public function create()
    {
        return view('student.create');
    }
    public function store(Request $request)
    {   
        $this->validate($request,[
            'name' => ['required', 'min:3'],
            'age' => ['required', 'numeric'],
            'birth_date' => ['required', 'date']
        ],[
            'name.required'=> 'Kolom nama harus diisi',
            'age.numeric' => 'Kolom umur harus berupa angka',
            'birth_date.required' => 'Kolom tanggal harus diisi'
        ]);

        Student::create([
            'name' => $request-> name,
            'birth_date' => $request-> birth_date,
            'age' => $request-> age,
            'is_verified' => false
        ]);
        
       return redirect()->route('student.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::find($id);

        return view('student.edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

    //    $student->name = $request->name;
    //    $student->birth_date = $request->birth_date;
    //    $student->age = $request->age;
    //    $student->is_verified = false;

    //    $student->save();
        
        $student->update([
            'name' => $request-> name,
            'birth_date' => $request-> birth_date,
            'age' => $request-> age,
            'is_verified' => false
        ]);

        return redirect()->route('student.index');
    }

    public function destroy($id)
    {   
        $student = Student::find($id);
        
        $student->delete();

        session()->flash('danger', 'Data berhasil dihapus');

        // dd(session()->all());

        return redirect()->route('student.index');
    }
}
