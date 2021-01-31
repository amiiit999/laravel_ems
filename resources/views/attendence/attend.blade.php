@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-panel grey-text text-darken-2 mt-20">
            <h4 class="grey-text text-darken-1 center">Employee Details</h4>
            <div class="row">
                <div class="row collection mt-20">
                    <!-- Show this image on small devices -->
                    <div class="hide-on-med-only hide-on-large-only row">
                        <div class="col s8 offset-s2 mt-20">
                            <img class="p5 card-panel emp-img-big" src="{{$employee->picture}}">
                        </div>
                    </div>
                    <div class="col m8 l8 xl8">
                        <h5 class="pl-15 mt-20">{{$employee->first_name}} {{$employee->last_name}}</h5>
                
                        <p class="pl-15"><i class="material-icons left">perm_identity</i>{{$employee->empDepartment->dept_name}}, {{$employee->empDesignation->emp_designation}}</p>
                           
              
                        @if(count($leaves)>0)
                      @foreach($leaves->all() as $leave)
                       <p class="pl-15 mt-20"><i class="material-icons left">calendar_today</i> {{$leave->month}}</p>
                        <p class="pl-15 mt-20"><i class="material-icons left">how_to_reg</i>LEAVE(S) - {{$leave->leaves}}</p>
                        <p class="pl-15 mt-20"><i class="material-icons left">access_time</i>09:40 - {{$leave->late_coming1}}</p>
                        <p class="pl-15 mt-20"><i class="material-icons left">access_time</i>10:30 - {{$leave->late_coming2}}</p>
                        <p class="pl-15 mt-20"><i class="material-icons left">access_time</i>Short Break - {{$leave->short_break}}</p>
                         
                       
                    </div>

                    <!-- Hide this image on small devices -->
                    <div class="hide-on-small-only col m4 l4 xl3">
                        <img class="p5 card-panel emp-img-big" src="{{$employee->picture}}">
                    </div>
                    
                     <a class="btn blue col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" href='{{url("leavesedit/$employee->id")}}'>Update</a>
                     @endforeach
                    @else
                      <a class="btn blue col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" href=
                      '{{url("add_leaves/$employee->id")}}'>Add Leave</a>
                      <br>
                       <br>

                    @endif
                </div>
                     @if(count($punchings)>0)
                      
                <div class="collection">
                    
                    
                     <div class="container">
    
        
            <table >
                <tbody>
                    <tr>
                        <th>ID:</th>
                       
                        <th>DATE:</th>
                         <th>DAY:</th>
                        <th>PUNCH IN:</th>
                        <th>PUNCH OUT:</th>
                         <th>UPDATE:</th>
                        

                    </tr>

                    @else
                      <a class="btn green col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" href=' {{url("attendence_create/$employee->id")}}'
                                    >mark attedence</a>

  @endif 
  

                    
                    
                    @if(count($punchings)>0)
                      @foreach($punchings->all() as $punching)
                        <tr>
                            <td>{{$punching->id}}</td>
                         
                            <td>{{$punching->date}}</td>
                               <td>{{$punching->day}}</td>
                            <td>{{$punching->punch_in}}</td>
                            <td>{{$punching->punch_out}}</td>
                           <td>  <a class="btn green" href="{{route('attendence.edit',$punching->id)}}">Update</a></td>
                           
                        </tr>
                      @endforeach
                    
                    @endif
                </tbody>
            </table>
        
   

                    
                    
                   
                </div>
                <br>
                
            </div>
        </div>
    </div>
@endsection