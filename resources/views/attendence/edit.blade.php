
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
                    <form action="{{route('attendence.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            
                            
                            
                            
                           <div class="input-field col s12 m6 l6 xl4">
                                
                                 <i class="material-icons prefix">access_time</i>
                                <select name="leaves">
                                    <option  >Leaves</option>
                                    <option>0</option>
                             <option>1</option>
                             <option>2</option>
                             
                                </select>
                                <label>Leaves</label>
                            </div>
                            
                            
                             
                            <div class="input-field col s12 m6 l6 xl4">
                                
                                 <i class="material-icons prefix">assignment_ind</i>
                                <select name="day">
                                    <option value="" disabled>Choose a Day</option>
                             <option>MONDAY</option>
                             <option>TUESDAY</option>
                             <option>WEDNESDAY</option>
                             <option>THURSDAY</option>
                             <option>FRIDAY</option>
                             <option>SATURDAY</option>
                                </select>
                                <label>DAY</label>
                            </div>
                             <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="p_date" id="p_date" class="datepicker" value="{{Request::old('p_date') ? : $employee->p_date}}">
                                <label for="p_date">Select Date</label>
                                <span class="{{$errors->has('p_date') ? 'helper-text red-text' : ''}}">{{$errors->has('p_date') ? $errors->first('p_date') : ''}}</span>
                            </div>
                           

                            <div class="input-field col s12 m6 l6 xl4">

                                 <p>Punch In Time</p>

                                <input type="time" name="in_time"  value="09:23 AM">
                              
                                <span class="{{$errors->has('birth_date') ? 'helper-text red-text' : ''}}">{{$errors->has('birth_date') ? $errors->first('birth_date') : '' }}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                            	
                                 <p>Punch Out Time</p>

                                <input type="time" name="out_time"  value="09:23 AM">
                              
                                <span class="{{$errors->has('birth_date') ? 'helper-text red-text' : ''}}">{{$errors->has('birth_date') ? $errors->first('birth_date') : '' }}</span>
                            </div>

                            <div class="input-field col s12 m6 l6 xl4">
                                
                                 <i class="material-icons prefix">access_time</i>
                                <select name="latecoming1">
                                    <option value="" disabled>Late Coming</option>
                                    <option>0</option>
                             <option>1</option>
                             <option>2</option>
                             
                                </select>
                                <label>Late Coming 09:40AM</label>
                            </div>

                            <div class="input-field col s12 m6 l6 xl4">
                                
                                 <i class="material-icons prefix">access_time</i>
                                <select name="latecoming2">
                                    <option value="" disabled>Late Coming</option>
                                    <option>0</option>
                             <option>1</option>
                             <option>2</option>
                             
                                </select>
                                <label>Late Coming 10:30AM</label>
                            </div>


                            <div class="input-field col s12 m6 l6 xl4">
                                
                                 <i class="material-icons prefix">visibility</i>
                                <select name="display">
                                    <option value="" disabled>Display</option>
                                    
                             <option>yes</option>
                             <option>no</option>
                             
                                </select>
                                <label>Late Coming 10:30AM</label>
                            </div>
                           
                            </div>
                        </div>
                        @method('PUT')
                        @csrf()
                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/employees">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection