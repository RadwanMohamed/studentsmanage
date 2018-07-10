<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPhotos;
use File;
use Illuminate\Support\Facades\View;
use App\Http\Requests\UserPhotoRequest;

class UserPhotoController extends Controller
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
        $userphotos = UserPhotos::find($id);
        return View::make('photomodal',compact('userphotos'));
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

        if ($request->ajax()) {
            $filename = $request['img']->store('photos');
            $img->update([
                'filename' => $filename
            ]);

            return response(['msg' => 'the image is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the image', 'status' => 'failed']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $img = UserPhotos::find($id);
        $image_path= public_path("app/".$img->filename);
        if(File::exists($image_path)) {
                File::delete($image_path);
        }

       if ($request->ajax()) {
            $img->delete();

            return response(['msg' => 'the image is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the image', 'status' => 'failed']);

    }
}
