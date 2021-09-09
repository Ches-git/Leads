<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupItem;
use App\Models\UserGroupItem;
use Illuminate\Http\Request;

class UserGroupItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
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
    public function store(Request $request, $id, $userId )
    {
//          $userid = $request->item["id"];
//          $existingItem = UserGroupItem::find($id);


        $existingItem = UserGroupItem::where('group_item_id', '=', $id)->where('user_id','=', $userId)->first();

        if ($existingItem) {
            return  'User is alredy assigned';
        } else {
            $newItem = UserGroupItem::create([
                'user_id' => $userId,
//            'created_at'=>$request->item['created_at'],
//            'updated_at'=>$request->item['updated_at'],
                'group_item_id' => $id,
            ]);

        }




        return response($newItem, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $userid)
    {

//        $existingItem = UserGroupItem::find($id);

        $existingItem = UserGroupItem::where('group_item_id', '=', $id)->where('user_id','=', $userid);
//        $results = SomeModel::where('location', $location)->where('blood_group', $bloodGroup)->get();
        $existingItem->delete();
//        foreach ($existingItem->findAssignees as $assignee) {
//            if ($assignee->id == $userid){
//                $assignee->delete();
                return 'done';
//            }
//        return $existingItem;
        }

//        if ( $existingItem ){
//            $existingItem->delete();
//            return 'Asignee succesfully deleted';
//        }
//        return 'Item not found';
//    }
}
