
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Update Employee</h4>
                </div>
                <hr>
                <div class="card-content">
                     <form action='{{url("attendence_store/$employee->id")}}' method="POST" >
                        {{ csrf_field() }}
                   <div class="row">
                             <div class="input-field col s4">
                                
                                 <i class="material-icons prefix">person_pin</i>
                                <select name="punchingid"  >
                                  
                                    <option >{{$employee->id}}</option>
                           
                                
                    
                             
                                </select>
                                <label>Punching Id</label>
                            </div>

                            <div class="input-field col s4">
                                <i class="material-icons prefix">fingerprint</i>
                                <input type="text" name="in_time" id="myTime" value="16:32:55">
                               
                                <span class="{{$errors->has('join_date') ? 'helper-text red-text' : ''}}">{{$errors->has('join_date') ? $errors->first('join_date') : ''}}</span>
                            </div>

                             <div class="input-field col s4">
                                <i class="material-icons prefix">fingerprint</i>
                                <input type="text" name="out_time" id="myTime" value="16:32:55">
                               
                                <span class="{{$errors->has('join_date') ? 'helper-text red-text' : ''}}">{{$errors->has('join_date') ? $errors->first('join_date') : ''}}</span>
                            </div>
                           
                             
                             <div class="input-field col s6">
                                
                                 <i class="material-icons prefix">calendar_today</i>
                                <select name="day">
                                    <option value="" disabled>Choose a Day</option>
                                    <option>Select Day</option>
                             <option>MONDAY</option>
                             <option>TUESDAY</option>
                             <option>WEDNESDAY</option>
                             <option>THURSDAY</option>
                             <option>FRIDAY</option>
                             <option>SATURDAY</option>
                                </select>
                                <label>DAY</label>
                            </div>
                            
                            <div class="input-field col s4">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="p_date" id="join_date" class="datepicker" value="{{old('join_date') ? : ''}}">
                                <label for="join_date">Date</label>
                                <span class="{{$errors->has('join_date') ? 'helper-text red-text' : ''}}">{{$errors->has('join_date') ? $errors->first('join_date') : ''}}</span>
                            </div>

                             
                           

                            
                             
                            
                           <div class="input-field col s12 m6 l6 xl4">
                                
                                 <i class="material-icons prefix">visibility</i>
                                <select name="display">
                                    <option value="" disabled>Display</option>
                                    
                             <option>yes</option>
                             <option>no</option>
                             
                                </select>
                                <label>Display</label>
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