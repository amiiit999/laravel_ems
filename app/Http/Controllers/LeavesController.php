<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Department;
use App\Country;
use App\City;
use App\Salary;
use App\Designation;
use App\State;
use App\Gender;
use App\Empleaves;
use App\Punching;

use Auth;

class LeavesController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
}

 public function index()
    {
       
        
        return view('attendence.createleaves');

    }

 public function addleaves($id)
    {
       
        
        $employee = Employee::find($id);
       $employee_id= new Empleaves;
       
        return view('attendence.createleaves',['employee_id'=>$employee_id,'employee'=>$employee]);

    }
   


     public function leavestore(Request $request,$id)
    {   
        $this->validate($request,[
       'punchingid'=>'required',
       'month'=>'required',
        'leaves'=>'required',
        'late_coming1'=>'required',
        'late_coming2'=>'required',
        'short_break'=>'required',
        
       ]);
         $leaves = new Empleaves;
         $leaves->employee_id = $request->input('punchingid');
          $leaves->month = $request->input('month');
         $leaves->leaves = $request->input('leaves');
         $leaves->late_coming1 = $request->input('late_coming1');
         $leaves->late_coming2 = $request->input('late_coming2');
         $leaves->short_break = $request->input('short_break');
         $leaves->save();
        
        return redirect('/attendence')->with('info','Employee Attendence Marked Succeessfully!');
    }

     public function leavesedit($id)
    {   
    	$leaveedit = Empleaves::find($id);
        
        return view('attendence.leaves_edit',['leaveedit'=>$leaveedit]);
    }

    

    public function updateleaves(Request $request,$id)
    {   
        $this->validate($request,[
       'punchingid'=>'required',
       'month'=>'required',
        'leaves'=>'required',
        'late_coming1'=>'required',
        'late_coming2'=>'required',
        'short_break'=>'required',
        
       ]);
         $leaves = Empleaves::find($id);
         $leaves->employee_id = $request->input('punchingid');
           $leaves->month = $request->input('month');
         $leaves->leaves = $request->input('leaves');
         $leaves->late_coming1 = $request->input('late_coming1');
         $leaves->late_coming2 = $request->input('late_coming2');
         $leaves->short_break = $request->input('short_break');
         $leaves->save();
        
        return redirect('/attendence')->with('info','Employee Attendence Marked Succeessfully!');
    }
}
