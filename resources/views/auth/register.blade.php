@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register an account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('File number') }}</label>

                            <div class="col-md-6">
                                <input id="file_number" type="text" class="form-control{{ $errors->has('file_number') ? ' is-invalid' : '' }}" name="file_number" value="{{ old('file_number') }}" required autofocus>

                                @if ($errors->has('file_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name') }}" required autofocus>

                                @if ($errors->has('middle_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="personal_photo" class="col-md-4 col-form-label text-md-right">{{ __('Personal Photo') }}</label>

                            <div class="col-md-6">
                                <input id="personal_photo" type="File" class="form-control{{ $errors->has('personal_photo') ? ' is-invalid' : '' }}" name="personal_photo" value="{{ old('personal_photo') }}" required>

                                @if ($errors->has('personal_photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('personal_photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name="nationality" id="exampleFormControlSelect1">
                                @foreach($data as $country)
                                    <option value="{{$country->nationality}}">{{$country->nationality}}</option>
                                @endforeach    
                                </select>
                                @if ($errors->has('nationality'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country of Birth') }}</label>

                            <div class="col-md-6">
                                  <select class="form-control" name="country" id="exampleFormControlSelect1">
                                    @foreach($data as $country)
                                     <option value="{{$country->en_short_name}}">{{$country->en_short_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        


                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                               <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="0" checked>
                                  <label class="form-check-label" for="exampleRadios1">
                                    Male
                                  </label>
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" >
                                  <label class="form-check-label" for="exampleRadios1">
                                    Female
                                  </label>
                                </div>
                            </div>
                        </div>

                         <div class="form-group row">
                                    <label for="passport_photo" class="col-md-4 col-form-label text-md-right">{{ __('Passport Photo') }}</label>

                                    <div class="col-md-6">
                                        <input id="passport_photo" type="File" class="form-control{{ $errors->has('passport_photo') ? ' is-invalid' : '' }}" name="passport_photo" value="{{ old('passport_photo') }}" required>

                                        @if ($errors->has('passport_photo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('passport_photo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                             </div>



                        <div class="form-group row">
                            <label for="graduation_degree" class="col-md-4 col-form-label text-md-right">{{ __('Graduation Degree') }}</label>

                            <div class="col-md-6">
                                <input id="graduation_degree" type="text" class="form-control{{ $errors->has('graduation_degree') ? ' is-invalid' : '' }}" name="graduation_degree" value="{{ old('graduation_degree') }}" required autofocus>

                                @if ($errors->has('graduation_degree'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('graduation_degree') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>






                         <div class="form-group row">
                                    <label for="graduation_photos" class="col-md-4 col-form-label text-md-right">{{ __('Graduation Photo') }}</label>

                                    <div class="col-md-6">
                                        <input id="graduation_photos" type="File" class="form-control{{ $errors->has('graduation_photos') ? ' is-invalid' : '' }}" name="graduation_photos[]"  multiple="" required>

                                        @if ($errors->has('graduation_photos'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('graduation_photos') }}
                                                {{ $errors->first('graduation_photos.0') }}

                                                </strong>
                                            </span>
                                        @endif
                                        
                                            {{ $errors->first('graduation_photos.0') }}

                                    </div>
                             </div>




                    
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
