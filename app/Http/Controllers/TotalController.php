<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\User;
use App\Favorite;
use App\Place_prefer;
use Illuminate\Http\Request;

class TotalController extends Controller
{
    public function place_favorite_store_post(Request $request){
    	$user_fb_id=$request->get('fb_id');
    	$place_id=$request->get('place_id');

    	$favorite=new favorite();
    	$favorite::where('user_fb_id',$user_fb_id);
    	$favorite::where('place_id',$place_id);

    	if($favorite->count()==0){
    		$favorite->user_fb_id=$user_fb_id;
    		$favorite->place_id=$place_id;
    		$favorite->save();
    	}


    	$response['status']=$place_id;
    	$response['message']='haha';

    	return $response;
    }

    public function place_favorite_retrieve_get(Request $request){
    	$user_fb_id=$request->get('fb_id');

    	$favorite=new favorite();
    	$favorite=$favorite->where('user_fb_id',$user_fb_id);

    	$response['status']=true;
    	$response['favorite_list']=$favorite->get();

    	return $response;
    }



    public function place_prefer_store_post(Request $request){
<<<<<<< HEAD
    	$place_id=$request->input('place_id');
    	$value_type=$request->input('value_type');

        echo $request::All();
=======


    	$place_id=$request->get('place_id');
    	$value_type=$request->get('value_type');
>>>>>>> 1f35d69d2879a899bdeefcfaf111d3793afe3531

        
    	$place_prefer=new place_prefer();
        $place_prefer=$place_prefer->where('place_id',$place_id);
        if($place_prefer->count()==0){

            $insert_place_prefer=new place_prefer();
            $insert_place_prefer->place_id=$place_id;

            $insert_place_prefer->save();
        }

        $place_prefer_increment=new place_prefer();
        $place_prefer_increment=$place_prefer_increment->where('place_id',$place_id);
    	if($value_type==1){
            $place_prefer_increment=$place_prefer_increment->increment('like');
        }
        else if($value_type==-1){
            $place_prefer_increment=$place_prefer_increment->increment('dislike');
        }


        $response['status']=$place_id;
        $response['message']='haha';

        return $response;
    }

    public function place_prefer_retrieve_get(Request $request){
    	$place_id=$request->get('place_id');

        $place_prefer=new place_prefer();
        $place_prefer=$place_prefer->where('place_id',$place_id);



        $response['status']=true;
        $response['data']=$place_prefer->get(array('like','dislike'));

        return $response;

    }



    public function user_store_post(Request $request){
    	$user_fb_id=$request->get('fb_id');

        $user=new User();
        $user=$user->select('fb_id',$user_fb_id);
        if($user->count()==0){
            $insertUser=new User();
            $insertUser->fb_id=$user_fb_id;
            $insertUser->save();
        }

        $response['status']=true;
        $response['message']='haha';

        return $response;
    }
}
