<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function editview(Employee $id){
        // dd($id);
        $employee = $id;
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
// 
    public function update(Request $request, Employee $id){
        $employee = $id;
        //validasi rikues
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email',
            'title' => 'required',
            'position' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            //masukan data
            $image = $request->file('image');
            $image->storeAs('public/pekerja', $image->hashName());

            //delete image dulu
            Storage::delete('public/pekerja/'. $employee->image);

            //update field
            $employee->update([
                'name' => $request->name,
                'email'=> $request->email,
                'title' => $request->title,
                'position' => $request->position,
                'status' => (int) '1',
                'image' => $image->hashName(),
            ]);
        }

        else {
            $employee->update([
                'name' => $request->name,
                'email'=> $request->email,
                'title' => $request->title,
                'position' => $request->position,
                'status' => (int) '1',
            ]);

        }

        return redirect('/list');
    }

    public function delete(Employee $id){
        // dd($id);
        $employee = $id;
        Storage::delete('public/pekerja/'.$employee->image);
        $id->delete();

        return redirect('/list');
    }
}
