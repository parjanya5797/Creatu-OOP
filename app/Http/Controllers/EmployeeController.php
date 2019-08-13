<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use App\Employee;
use Session;    

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = Employee::all();
       return view('employee.index',compact('emp'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        
         $this->validate($request,[
            'name' => 'required|string',
            'post' => 'required',
            'phone_no' => 'required|integer',
            'address' => 'required',
            'image' => 'required',
        ]);
        
        $data=new Employee([
            'name' => $request->get('name'),
            'post' => $request->get('post'),
            'phone_no' => $request->get('phone_no'),
            'address' => $request->get('address'),
            
           ]);
         if($request->image)
        {
            $file =$request->image;
            //dd($file);
            $filename = time().$file->getClientOriginalName();
            $destinationPath = public_path('uploads');
            $file->move($destinationPath,$filename);
            $data->image = $filename;
        }
        
        $data->save();
        Session::flash('success');
        return redirect('/employee');
    }

    public function edit($id)
    {
        $emp = Employee::find($id);
        return view('employee/edit',compact('emp'));
    }

    public function update($id,Request $request)
    {

        $data = $request->validate([
            'name'=>'required',
            'post'=>'required|',
            'phone_no'=>'required|integer',
            'address'=>'required|',
            'image' => 'required|mimes:svg,jpg,png,gif'
        ]);
       if($emp = Employee::find($id)) {
        $emp->name = $request->get('name');
        $emp->post = $request->get('post');
        $emp->phone_no = $request->get('phone_no');
        $emp->address = $request->get('address');
        if($request->image)
        {
            if($emp->image && file_exists('uploads/'.$emp->image))
            {
                unlink('uploads/'.$emp->image);
            }
            $file =$request->image;
            //dd($file);
            $filename = time().$file->getClientOriginalName();
            $destinationPath = public_path('uploads');
            $file->move($destinationPath,$filename);
            $data->image = $filename;
        }   
        $emp->save();
        Session::flash("updatesuccess");
        return redirect('/product');
       } else {
           dd('not found');
       }

    }
}
