<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        foreach($user-> groups as $group) {
            $groupUser  = $group->users;
            $group-> pivot = $groupUser;
            $group->groupItems = $group->groupitem;
        }
        return (
            $user->groups
        );
    }

    public function showMembers($id){
        $group = Group::find($id);
        return ($group->users);
    }


    public function showAllGroups(){
        $groups = Group::all();
        foreach($groups as $group) {
            $groupUser  = $group->users;
            $group-> pivot = $groupUser;
            $group->groupItems = $group->groupitem;
        }
        return($groups);
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
        $newItem = Group::create([
            'name' => $request->item["name"],
//            'user_id' => auth()->user()->id,
        ]);

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
    public function destroy($id)
    {
        $existingItem = Group::find($id);

        if ( $existingItem ){
            $existingItem->delete();
            return 'group succesfully deleted';
        }
        return 'Group not found';
    }
}
