<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class Crud extends Controller
{

    public function index()
    {
        return view('crud/index');
    }

    public function view()
    {
        $students = Students::all();
        return view('crud/view')->with('students', $students);
    }

    public function saveStudent(Request $request)
    {
        $students = new Students();
        $students->first_name = $request->input('first_name');
        $students->last_name = $request->input('last_name');
        $students->email = $request->input('email');
        $students->password = $request->input('password');
        $students->address = $request->input('address');
        $students->save();
        Session::flash('message', 'Students info save successfully');
        return redirect('/');


    }

    public function delete($id)
    {
        Students::find($id)->delete();
        return redirect('/view');
    }

    public function edit($id)
    {

        $student = Students::find($id);
        return view('crud/edit')->with('student', $student);

    }

    public function updateStudent(Request $request)
    {
        $id = $request->input('id');
        $student = Students::find($id);
        $student->first_name = $request->input('first_name', 50);
        $student->last_name = $request->input('last_name', 50);
        $student->email = $request->input('email', 50);
        $student->address = $request->input('address');
        $student->save();
        return redirect('/view');
    }

    public function test()
    {
        //$student = DB::table('students')->get();
        $student = DB::table('students')->where('last_name', 'Lnong')->get();

        // var_dump($user->name);

        foreach ($student as $studen)
        {
        var_dump($studen->first_name);
        }
    }
}
