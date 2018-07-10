<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserPhotos;
use File;
use Illuminate\Support\Facades\View;
use App\countries;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);
        $data = countries::all();
        return View::make('modal',compact('user','data'));
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
        if ( $request->ajax() ) {
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

            return response(['msg' => 'the user is updated successfully', 'status' => 'success']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
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

        if ($request->ajax()) {
           $user->delete();
           return response(['msg' => 'the user is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the user', 'status' => 'failed']);

    
    

    }
}
