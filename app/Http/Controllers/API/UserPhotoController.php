<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPhotoRequest;
Use App\UserPhotos;
use File;
class UserPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = UserPhotos::all();
         return response()->json([
            'error' => 'false',
            'photos' => $photos,
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
        $photo = UserPhotos::find($id);
         return response()->json([
            'error' => 'false',
            'photo' => $photo,
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
    public function update(UserPhotoRequest $request, $id)
    {
        $img = UserPhotos::find($id);
        $image_path= public_path("app/".$img->filename);
        if(File::exists($image_path)) {
                File::delete($image_path);
        }

        
            $filename = $request['img']->store('photos');
            
            $img->update([
                'filename' => $filename
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

        $img = UserPhotos::find($id);
        $image_path= public_path("app/".$img->filename);
        if(File::exists($image_path)) {
                File::delete($image_path);
        }

            $img->delete();

         return response()->json([
            'error' => 'false',
            'status'=>200]);

    }
}
