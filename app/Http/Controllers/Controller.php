<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\UserPhotos;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * upload function is used to upload more than one photo using saveImage function
     * @param  array $data    
     * @param  int    $user_id 
     * @return       boolean
     */
     public function upload($data,$user_id){
    	foreach ($data as $key=>$photo) {
			if(is_array($photo))
				{
					foreach ($photo as $key1 => $value) {
						$this->saveImage($value,$key,$user_id);
					}
				}else{
						$this->saveImage($photo,$key,$user_id);
				}    			
    	}
    	return true;    	
    }

    /**
     * upload one photo 
     * @param  file $photo   
     * @param  string $key     
     * @param  int    $user_id 
     */
    public function saveImage($photo,$key,$user_id){
    		if(is_object($photo))
    		{
    			$filename = $photo->store('photos');
    			
    			UserPhotos::create([
    				'filename' => $filename,
    				'type' => $key,
    				'user_id'=>$user_id
    			]);

    		}
    }

}
