<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupItem;
use App\Models\Item;
use App\Models\User;
use App\Models\UserGroupItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $group = Group::find($id);


        foreach ($group->groupitem as $groupitem) {
            $groupitem->assignees = $groupitem->findAssignees;
        }

        return ($group->groupitem);
    }

    public function findUser($id)
    {
        $user = User::find($id);
        return ($user);
    }

    public function showAll()
    {
        $id = auth()->user()->id;


//
        $user = User::find($id);

        return $user->groupItems;

////        $arr[] = $user->groupItems;
////        $existingItem = GroupItem::where('group_item_id', '=', $id)->where('user_id','=', $userid);
//
//        foreach ($user->groups as $group){
//            $user->groupItems = $group->groupitem;
////        }
//            $existingItem = UserGroupItem::where('group_item_id', '=', $id)->where('user_id','=', $userid);
////
//        return GroupItem::where('group_id','=', 1);

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id)
    {
        $newItem = GroupItem::create([
            'name' => $request->item["name"],
            'group_id' => $id,
        ]);
        return response($newItem, 201);
    }

//    public function addAssignee(Request $request, $id)
//    {
//        $existingItem = GroupItem::find($id);
//
//
//        if ($existingItem) {
//            $existingItem->assignees = $request->item["assignees"];
//            $existingItem->save();
//            return $existingItem;
//        }
//
//
//        return "Item not found.";
//    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingItem = GroupItem::find($id);

//        if ($existingItem->user_id !== auth()->user()->id) {
//            return response()->json('Unauthorized', 401);
//        }
        if ($existingItem) {
            $existingItem->completed = $request->item['completed'] ? true : false;
            $existingItem->important = $request->item['important'] ? true : false;
            $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existingItem->name = $request->item["name"];
            $existingItem->description = $request->item['description'];
            $existingItem->save();
            return $existingItem;
        }

        return "Item not found.";
    }

    public function updateAll(Request $request, $id)
    {
        $data = $request->validate([
            'completed' => 'required|boolean',
        ]);

        GroupItem::where('group_id', $id)->update($data);

        return response()->json('Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = GroupItem::find($id);

//        if($existingItem->user_id !== auth()->user()->id) {
//            return response()->json('Unauthorized', 401);
//        }

        if ($existingItem) {
            $existingItem->delete();
            return 'Item succesfully deleted';
        }
        return 'Item not found';
    }
}
