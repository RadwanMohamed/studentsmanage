@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">you are logged in</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div id="results">

</div>
                    <table class="table">
                      <thead>
                        <tr>
                           <!-- ``, ``, ``, ``, ``, `password`, ``, ``, ``, ``--> 

                          <th scope="col">#</th>
                          <th scope="col">file number</th>
                          <th scope="col">first name</th>
                          <th scope="col">middel name</th>
                          <th scope="col">Surname</th>
                          <th scope="col">birthday</th>
                          <th scope="col">nationality</th>
                          <th scope="col">country</th>
                          <th scope="col">gender</th>
                          <th scope="col">graduation degree</th>
                          <th scope="col">action</th>

                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          
                          <th scope="row">1</th>
                          <th scope="row">{{Auth::user()->file_number}}</th>
                          <th scope="row">{{Auth::user()->first_name}}</th>
                          <th scope="row">{{Auth::user()->middle_name}}</th>
                          <th scope="row">{{Auth::user()->surname}}</th>
                          <th scope="row">{{Auth::user()->date_of_birth}}</th>
                          <th scope="row">{{Auth::user()->nationality}}</th>
                          <th scope="row">{{Auth::user()->country}}</th>
                          <th scope="row">{{(Auth::user()->gender)==0? "male" : "female"}}</th>
                          <th scope="row">{{Auth::user()->graduation_degree}}</th>
                          <th scope="row">
                              <button class="alert alert-danger deluser" href="/student/{{Auth::user()->id}}/delete" >del</button>





                              <button  href="/student/{{Auth::user()->id}}/edit" class="btn btn-info edituser" data-toggle="modal" data-target="#modalLoginForm">Edit</button>

                          </th>
                          </tr>
                      </tbody>
                    </table>
                </div>
                    @foreach(Auth::user()->photos as $photo)
                ​<picture class="student_photo{{$photo->id}}">
                      <source  type="image/svg+xml">
                      <img src="http://localhost:8000/app/{{$photo->filename}}" class="img-fluid img-thumbnail"alt="..." width="100px" height="100px"><br>
                      <button class="alert alert-danger delph" href="/photo/{{$photo->id}}/delete" id="student_photo{{$photo->id}}">delete</button>

                      <button  href="/photo/{{$photo->id}}/edit" class="btn btn-info edituserphoto" data-toggle="modal" data-target="#modalLoginForm">Edit</button>


                    
                </picture>
                      @endforeach

                <div class="clear"> </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="container">
        </div>
</div>


@endsection
