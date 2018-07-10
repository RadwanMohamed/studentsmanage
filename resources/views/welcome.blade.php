<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Doc</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 500px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <h3>this system is divided into two parts</h3>
                <h3>the first part is the websit:- </h3><br>
                <p> the task i built is a student registeration form to help student to sign an account 

                and CRUD system to help the user to edit his information or delete the account


                I dont know if you want a system that has admin to control students and add them or edit their information, but if you want that. i can make that easily. 

            </p>

            <h4> login data is</h4>
            <p>
                username = file number<br>
                password = birth date
            </p>

            <h3> the second part is the api for mobile apps</h3>
            <p> I built that part to help Mobile to make CRUD system in the students and its information</p> <br>


            <p>
                the urls {<br>
                //user<br>
                1- '/api/students'             :   method=> get    :  return all users in database<br>
                2- '/api/student/{id}/show',   :   method=> get   : return  user by id<br>
                3- '/api/student'              :   method=> POST   :  add user <br>
                4- '/api/student/{id}/delete'  :   method=> get    :  delete user by id<br>
                5- '/api/student/{id}/update'  :   method=> PUT    :  update user by id<br>


                //photos<br>

                1- '/api/photos'               :    method=> get   : return all photos<br>
                2- '/api/photo/{id}/show',     :    method=> get   : return  photo by id<br>
                3- '/api/photo/{id}/delete',   :    method=> get   : delete  photo by id<br>
                4- '/api/photo/{id}/update',   :    method=> PUT   : update  photo by id<br>

            } <br>

            just make sure that you have added ["X-Requested-With":"XMLHttpRequest"] in the header of the request
            </p><br>

            <h3> Tools & technologies </h3>
            <h4> sublime</h4>
            <h4> Linux os</h4>
            <h4> Linux postman</h4>
            <h4> laravel</h4>
            <h4> JQ & Ajax</h4>

               
            
            </div>
             
        </div>
    </body>
</html>
