<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
            <form action="/student/{{$user->id}}/update" method="POST" class="edituserform" >
                      {{csrf_field()}}
                    {{method_field('PUT')}}
                      <div id='editformresults'> </div>
                      

                <div class="md-form mb-5" id="zfile_number">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Your file number</label>
                    <input type="text" id="defaultForm-file_number" class="form-control validate" value="{{$user->file_number}}" name="file_number">
                    
                    <span class="help-block">
                    <strong class="zfile_number"></strong>
                    </span>
                </div>


                <div class="md-form mb-5" id="first_name">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-first_name">Your first name</label>
                    <input type="text" id="defaultForm-file_number" class="form-control validate" value="{{$user->first_name}}" name="first_name">
                    
                    <span class="help-block">
                    <strong class="first_name"></strong>
                </span>
                </div>
                <div class="md-form mb-5" id="middle_name">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input name="middle_name" type="text" id="defaultForm-file_number" class="form-control validate" value="{{$user->middle_name}}">
                    <label data-error="wrong" data-success="right" for="defaultForm-middle_name">Your middle name</label>
                    <span class="help-block">
                    <strong class="middle_name"></strong>
                </span>
                </div>

                <div class="md-form mb-5" id="surname">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Your Surnumber</label>
                    <input type="text" id="defaultForm-file_number" class="form-control validate" value="{{$user->surname}}"name="surname">
                    <span class="help-block">
                    <strong class="surname"></strong>
                </span>
                </div>


                <div class="md-form mb-5" id="date_of_birth">
                    <i class="fa fa-envelope prefix grey-text"></i>
                     <label data-error="wrong" data-success="right" for="defaultForm-email">Your date of birth</label>
                    <input type="date" id="defaultForm-file_number" class="form-control validate" value="{{$user->date_of_birth}}" name="date_of_birth">
                   
                    <span class="help-block">
                    <strong class="date_of_birth"></strong>
                </span>
                </div>



                <div class="md-form mb-5" id="country">
                    <i class="fa fa-envelope prefix grey-text"></i>
                     <label data-error="wrong" data-success="right" for="defaultForm-email">Your country</label>
                    <select name="country" class="form-control"  id="exampleFormControlSelect1">
                                    @foreach($data as $country)
                                     <option value="{{$country->en_short_name}}">{{$country->en_short_name}}</option>
                                    @endforeach
                    </select>
                   
                    <span class="help-block">
                    <strong class="country"></strong>
                </span>
                </div>

                <div class="md-form mb-5" id="nationality">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Your nationality</label>
                    <select class="form-control" name="nationality" id="exampleFormControlSelect1">
                                @foreach($data as $country)
                                    <option value="{{$country->nationality}}">{{$country->nationality}}</option>
                                @endforeach    
                    </select>
                    
                    <span class="help-block">
                    <strong class="nationality"></strong>
                </span>

                </div>

                <div class="md-form mb-5" id="gender">

 <label class="form-check-label" for="exampleRadios1 ">
                                    Gender
                                  </label>
                    <i class="fa fa-envelope prefix grey-text"></i>
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
                                <span class="help-block">
                    <strong class="gender"></strong>
                </span>
                </div>


                
                <div class="md-form mb-5">
                 
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Your graduation</label>
                    <input type="text" id="defaultForm-file_number" class="form-control validate" value="{{$user->graduation_degree}}" name="graduation_degree">
                    
                    <span class="help-block">
                    <strong class="graduation_degree"></strong>
                </span>
                </div>

                 <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" id="save">Edit</button>
            </form>

            </div>
            </div>
          
        </div>
    </div>


    <script>
    $(document).on('click','#save',function(e){

        
        e.preventDefault();
        Button = $(this);
        form = Button.parents('.edituserform');
        url = form.attr('action');
        data = new FormData(form[0]);
        console.log(data);
        result = form.find('#editformresults');
       $.ajax({
           data:data,
       type: 'POST',
      
       url: url,

    
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       dataType: 'json',
      beforeSend: function () {
          result.removeClass().addClass('alert alert-info').html('loading....');
        
        },
            error: function(data) {
                var error = data.responseJSON['errors'];
                if (error.hasOwnProperty('file_number'))
                {
                    $.each(error['file_number'], function (i,m) {
                        $("#zfile_number").removeClass().addClass('form-group has-error ');
                        $('.zfile_number').html(m).addClass('text-danger');
                    });

                }
                else if (error.hasOwnProperty('first_name')) {
                    $.each(error['first_name'], function (i, m) {
                        $("#first_name").removeClass().addClass('form-group  has-error');
                        $('.first_name').html(m).addClass('text-danger');
                    });
                }
                else if (error.hasOwnProperty('middle_name')) {
                    $.each(error['middle_name'], function (i, m) {
                        $("#middle_name").removeClass().addClass('form-group  has-error');
                        $('.middle_name').html(m).addClass('text-danger');
                    });
                }
               else if (error.hasOwnProperty('surname')){
                   $.each(error['surname'], function (i,m) {
                       $("#surname").removeClass().addClass('form-group  has-error');
                       $('.surname').html(m).addClass('text-danger');
                   });}
                   else if (error.hasOwnProperty('date_of_birth')){
                   $.each(error['date_of_birth'], function (i,m) {
                       $("#date_of_birth").removeClass().addClass('form-group  has-error');
                       $('.date_of_birth').html(m).addClass('text-danger');

                   });}
                   else if (error.hasOwnProperty('nationality')){
                   $.each(error['nationality'], function (i,m) {
                       $("#nationality").removeClass().addClass('form-group  has-error');
                       $('.nationality').html(m).addClass('text-danger');

                   });}
                   else if (error.hasOwnProperty('country')){
                   $.each(error['country'], function (i,m) {
                       $("#country").removeClass().addClass('form-group  has-error');
                       $('.country').html(m).addClass('text-danger');

                   });}
                   else if (error.hasOwnProperty('gender')){
                   $.each(error['gender'], function (i,m) {
                       $("#gender").removeClass().addClass('form-group  has-error');
                       $('.gender').html(m).addClass('text-danger');
                   });
               }else if (error.hasOwnProperty('graduation_degree')){
                   $.each(error['graduation_degree'], function (i,m) {
                       $("#graduation_degree").removeClass().addClass('form-group  has-error');
                       $('.graduation_degree').html(m).addClass('text-danger');
                   });               }
              else {
                    console.log(data.responseText);
                }
            },

            success: function (data) {
                    if(data.status == "failed"){
                        result.removeClass().addClass('alert alert-warning').html(data.msg);

                    }else {
                        result.removeClass().addClass('alert alert-success').html(data.msg);

                    }
            },
            cache: false,
            processData: false,
            contentType: false,



        })
    });
</script>