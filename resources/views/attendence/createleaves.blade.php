
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Add Employee Leaves</h4>
                </div>
                <hr>
                <div class="card-content">
                     <form action='{{url("leavesd/$employee->id")}}' method="POST" >
                        {{ csrf_field() }}
                   <div class="row">
                             <div class="input-field col s4">
                                
                                 <i class="material-icons prefix">person_pin</i>
                                <select name="punchingid">
                                     <option >{{$employee->id}}</option>
                             
                                </select>
                                <label>Punching Id</label>
                            </div>
                           
                           <div class="input-field col s6">
                                
                                 <i class="material-icons prefix">calendar_today</i>
                                <select name="month">
                                    <option value="" disabled>Select Month</option>
                                    <option>Select Date</option>
                             <option>JANUARY</option>
                             <option>FEBRUARY</option>
                             <option>MARCH</option>
                             <option>APRIL</option>
                             <option>MAY</option>
                             <option>JUNE</option>
                             <option>JULY</option>
                             <option>AUGUST</option>
                             <option>SEPTEMBER</option>
                                </select>
                                <label>Select Month</label>
                            </div>


                            <div class="input-field col s4">
                                <i class="material-icons prefix">fingerprint</i>
                                <input type="text" name="leaves">
                                   
                                
                                  <label>Leaves</label>
                            </div>

                            <div class="input-field col s4">
                                <i class="material-icons prefix">fingerprint</i>
                                <input type="text" name="late_coming1" >
                               
                               
                                  <label>Late Comimg1</label>
                            </div>
                           
                              <div class="input-field col s4">
                                <i class="material-icons prefix">fingerprint</i>
                                <input type="text" name="late_coming2" >
                               
                               
                                  <label>Late Comimg2</label>
                            </div>

                             <div class="input-field col s4">
                                <i class="material-icons prefix">fingerprint</i>
                                <input type="text" name="short_break" >
                               
                               
                                  <label>Short Break</label>
                            </div>
                            </div>
                        </div>
                       
                        @csrf()
                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/attendence">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection