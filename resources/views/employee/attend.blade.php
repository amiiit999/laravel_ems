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
                        <p class="pl-15 mt-20"><i class="material-icons left">location_city</i>{{$employee->address}}</p>
                        <p class="pl-15"><i class="material-icons left">location_on</i>{{$employee->empCity->city_name}}, {{$employee->empState->state_name}}, {{$employee->empCountry->country_name}}</p>
                        <p class="pl-15"><i class="material-icons left">person_outline</i>{{$employee->empGender->gender_name}}</p>
                    </div>
                    <!-- Hide this image on small devices -->
                    <div class="hide-on-small-only col m4 l4 xl3">
                        <img class="p5 card-panel emp-img-big" src="{{$employee->picture}}">
                    </div>
                </div>
                <div class="collection">
                    
                    
                     <div class="container">
    
        
            <table >
                <tbody>
                    <tr>
                        <th>ID:</th>
                        <th>PUNCH IN:</th>
                        <th>PUNCH OUT:</th>
                        <th>UPDATE</th>
                        

                    </tr>

                    @if(count($punchings)>0)
                      @foreach($punchings->all() as $punching)
                        <tr>
                            <td>{{$punching->id}}</td>
                            <td>{{$punching->punch_in}}</td>
                            <td>{{$punching->punch_out}}</td>
                           
                           
                        </tr>
                      @endforeach
                    
                    @endif
                </tbody>
            </table>
        
   

                    
                    
                   
                </div>
                <form action="{{route('employees.destroy',$employee->id)}}" method="POST">
                    @method('DELETE')
                    @csrf()
                    <button class="btn red col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" type="submit">Delete</button>
                </form>
                <a class="btn orange col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" href="{{route('employees.edit',$employee->id)}}">Update</a>
            </div>
        </div>
    </div>
@endsection