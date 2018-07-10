<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use File;
class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users =User::all();
        return response()->json([
            'error' => 'false',
            'users' => $users,
            'status'=>200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'file_number' => $request['file_number'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'surname' => $request['surname'],
            'date_of_birth' => $request['date_of_birth'],
            'password' =>bcrypt($request['date_of_birth']),
            'nationality' => $request['nationality'],
            'country' => $request['country'],
            'gender' => $request['gender'],
            'graduation_degree' => $request['graduation_degree'], 
        ]);
        $this->upload($request,$user->id); 
        return response()->json([
            'error' => 'false',
            'status'=>200
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
          return response()->json([
            'error' => 'false',
            'user' => $user,
            'status'=>200
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([ 
                'file_number' => $request['file_number'],
                 'first_name' => $request['first_name'],
                 'middle_name' => $request['middle_name'],
                 'surname' => $request['surname'],
                 'date_of_birth' => $request['date_of_birth'],
                 'nationality' => $request['nationality'],
                 'country' => $request['country'],
                 'gender' => $request['gender'],
                 'graduation_degree' => $request['graduation_degree'],
                 'password'=>bcrypt($request['date_of_birth']),
            ]);

         
             return response()->json([
            'error' => 'false',
            'status'=>200]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(count($user->photos)>0 ){
            foreach ($user->photos as $photo) {
              $image_path = public_path("app/".$photo->filename);
               if(File::exists($image_path)) {
                File::delete($image_path);

                }
            }

        }

        if($user->delete())
             return response()->json([
            'error' => 'false',
            'status'=>200
        ]);
    }
}
