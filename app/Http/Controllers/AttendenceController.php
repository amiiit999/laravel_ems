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
use App\Punching;
use App\Empleaves;
use Auth;

class AttendenceController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_id= new Employee();
        $employee_uid=$employee_id->punching_id;
        $punching = DB::table('employees')
                    ->join('punchings','employees.id','=','punchings.employee_id')
                    ->select('employees.*','punchings.*')
                    ->where(['punchings.employee_id' => $employee_uid])
                    ->first();
        $employees = Employee::Paginate(4);
        return view('attendence.index')->with('employees',$employees);
        return view('attendence.index',['punching'=>$punching]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $employee_id= new Empleaves;
       
        return view('attendence.create',['employee_id'=>$employee_id]);
    }

 public function attcreate($id)
    {
    	 $employee = Employee::find($id);
       $employee_id= new Empleaves;
       
        return view('attendence.create',['employee_id'=>$employee_id,'employee'=>$employee]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attstore(Request $request,$id)
    {   
        $this->validate($request,[
       'punchingid'=>'required',
         
        'day'=>'required',
        'p_date'=>'required',
        'in_time'=>'required',
        'out_time'=>'required',
         
         'display'=>'required',
       ]);
        $punching = new Punching;
        $punching->employee_id = $request->input('punchingid');
        
        $punching->day = $request->input('day');
         $punching->date    = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('p_date'))));
        $punching->punch_in = $request->input('in_time');
         $punching->punch_out = $request->input('out_time');
       
        $punching->pass =$request->input('display');
         $punching->save();
        
        return redirect('/attendence')->with('info','Employee Attendence Marked Succeessfully!');
    }
public function punching_update(Request $request,$id){
$this->validate($request,[
       'punchingid'=>'required',
         
        'day'=>'required',
        'p_date'=>'required',
        'in_time'=>'required',
        'out_time'=>'required',
         
         'display'=>'required',
       ]);
         
        $punching = Punching::find($id);
        $punching->employee_id = $request->input('punchingid');
       
        $punching->day = $request->input('day');
         $punching->date    = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('p_date'))));
        $punching->punch_in = $request->input('in_time');
         $punching->punch_out = $request->input('out_time');
       
        $punching->pass =$request->input('display');
         $punching->save();
        
        return redirect('/attendence')->with('info','Employee Attendence Marked Succeessfully!');
    }

 
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
         
        $punchings= Punching::where('employee_id','=',$id)->get();
          $leaves= Empleaves::where('employee_id','=',$id)->get();
        

         return view('attendence.attend',['punchings'=>$punchings,'employee'=>$employee,'leaves'=>$leaves]);
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         *  this is same as create but with an existing
         *  employee
         */
        

        $punching = Punching::find($id);
        return view('attendence.attendence_edit')->with([
            'punching'  => $punching
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validateRequest($request,$id);
        $punching = Punching::find($id);
       
        
        $this->setPunching($punching,$request);
        return redirect('/attendence')->with('info','Selected Employee has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        Storage::delete('public/employee_images/'.$employee->picture);
        return redirect('/employees')->with('info','Selected Employee has been deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search'   => 'required|min:1',
            'options'  => 'required'
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $employees = Employee::where($option, 'LIKE' , '%'.$str.'%')->Paginate(4);
        return view('employee.index')->with(['employees' => $employees , 'search' => true ]);
    }

    /**
     * This method is used for validating the form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    private function validateRequest($request,$id){
        /**
         *  specifying the validation rules 
         */
        /**
         *  Below in Picture validation rules we are first checking
         *  that if there is an image, if not then don't apply the
         *  validation rules. the reason we are doing this is because
         *  if we are updating an employee but not updating the image. 
         */
        return $this->validate($request,[
            'leaves'     =>  'required',
           
            'day'            =>  'required',
            'p_date'        =>  'required',
            'in_time'          =>  'required',
            'out_time'         =>  'required',
            'latecoming1'     =>  'required',
            'latecoming2'       =>  'required',
            
            /**
             *  if we are updating an employee but not changing the
             *  email then this will throw a validation error saying
             *  that email should be unique. that's why we need to specify
             *  the current employee to ignore the unique validation rule.
             *  Above in email rules , we are using a ternary operator simply
             *  saying that if we pass an id then it will ignore that employee
             *  (which we want in update) and if id's null then it will check
             *  every employee to be unique (which we want in create because
             *  every employee should have a unique email).
             *  check the documentation for more details, 
             *  https://laravel.com/docs/5.6/validation#rule-unique 
             */

            
        ]);
    }

    /**
     * Save a new resource or update an existing resource.
     *
     * @param  App\Employee $employee
     * @param  \Illuminate\Http\Request  $request
     * @param  string $fileNameToStore
     * @return Boolean
     */
    private function setPunching(Punching $punching,Request $request){
       $punching = new Punching();
        
        $punching->day        = $request->input('day');
        
        $punching->date    = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('p_date'))));
        $punching->punch_in          = $request->input('in_time');
        $punching->punch_out      = $request->input('out_time');
           $punching->leaves   = $request->input('leaves');
        $punching->late_coming1        = $request->input('latecoming1');
          $punching->late_coming2        = $request->input('latecoming2');
          $punching1 = new Employee();
           $punching=$punching1->id;
        $punching->save();
    }

}
