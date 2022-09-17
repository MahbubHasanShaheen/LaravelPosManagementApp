@extends('dashboard')

@section('content')
  <div class="container">
         <div class="emp mt-5" >
            <div class="employee" style="width:75%; margin:0 auto">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif

    @if(session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif

            <a class="text-success mb-2 mt-2">View Attendence - {{ $date->att_date}}</a>
           
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>Name</th>
                     <th>Photo</th>
                     <th>Attendence Role</th>
                   </tr>
                 </thead>
        
                 <tbody>
            
                  @foreach( $data as $row )
                 
                   <tr>
                     <td>{{ $row->employee->name }}</td>
                     <td><img src="{{URL::to($row->employee->photo)}}" height="50" alt=""></td>
                     <input type="hidden" name="id[]" value="{{$row->id}}">
                     <td>

                        <input  type="radio" name="attendence[{{ $row->id }}]" value="Present" disabled=""
                         <?php
                          if ($row->attendence == 'Present'){
                          echo 'checked';
                          } 
                          ?>
                          >Prensent

                        <input  type="radio" name="attendence[{{ $row->id }}]" value="Leave" disabled="" <?php
                          if ($row->attendence == 'Leave'){
                          echo 'checked';
                          } 
                          ?>
                           >Leave

                        <input  type="radio" name="attendence[{{ $row->id }}]" value="Absense" disabled="" <?php
                          if ($row->attendence == 'Absense'){
                          echo 'checked';
                          } 
                          ?>
                           >Absense

                    </td>
                      <input type="hidden" name="att_date" value="{{ date('d/m/y')}}">
                      <input type="hidden" name="att_year" value="{{ date('Y')}}">
                      <input type="hidden" name="month" value="{{ date('F')}}">
                   </tr>
                   @endforeach
                 </tbody>
               </table>
        
            </div>
         </div>
         
  </div>
@endsection