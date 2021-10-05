<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommenterController extends Controller
{


    public function index($id)
    {
        $comment = Comment::where('guid',$id)->get();
        return $comment;
    }

    public function store(Request $request, $id)
    {
        $existingComment = Comment::where('guid',$id)->first();

        if($existingComment){
            $existingComment->comment = $request->comment["comment"];
            $existingComment->author = $request->comment["author"];
            $existingComment->save();
            return  response($existingComment,201);
        } else {
            $newComment = Comment::create([
                'comment' => $request->comment["comment"],
                'author' => $request->comment["author"],
                'guid' => $request->comment["guid"],
            ]);
            return response($newComment, 201);

        }



    }

}
