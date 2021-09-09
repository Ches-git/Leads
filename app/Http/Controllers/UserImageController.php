<?php

namespace App\Http\Controllers;

use App\Models\User;

//use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserImageController extends Controller
{
    public function upload(Request $request)
    {

//        $path = $request->file('image')->store('image');

//        return $path;

//        try {
//        if ($request->hasFile('image')) {
            $file = ($request->file('image'));
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('userImages'), $file_name);
            $file_path = '/userImages/'.$file_name;
            $id = auth()->user()->id;
            $user = User::find($id);
////
                if ( $user ){
                    $user->image_name = $file_name;
                    $user->file_path = $file_path;
                    $user->save();
                }
            return response()->json([
                'message' => 'Image uploaded successfully'
            ], 200);
//
//            }
//        } catch (\Exception $exception){
//            return response()->json([
//                'message'=>$exception->getMessage()
//            ]);
//             }
//        }
         }
        public function getImage()
        {
            $id = auth()->user()->id;

            $user = User::find($id);
            $path = $user->file_path;
              return $path;

        }
    }

