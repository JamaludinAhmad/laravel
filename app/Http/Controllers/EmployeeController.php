<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //

    public function index(){
        $employees = Employee::latest()->paginate(5);
        // dd($employees);

        return view('posts.index', compact('employees'));
    }

    public function createview(){
        return view('posts.tambah');
    }

    public function updateview(Employee $employee){
        // dd($employee);
        return view('posts.edit', compact('employee'));
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email',
            'title' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        //masukan image ke folder
        $image =$request->file('image');
        $image->storeAs('/public/pekerja', $image->hashName());

        //masukan data ke database
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'position' => $request->position,
            'status'=> (int)'1',
            'image' => $image->hashName(),
        ]);

        return redirect('/list');
    }
}
