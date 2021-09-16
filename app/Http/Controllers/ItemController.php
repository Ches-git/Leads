<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Item;
//use Illuminate\Support\Carbon;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::where('user_id', auth()->user()->id)->get();
    }

    public function findTodo($id){
        $userId = auth()->user()->id;
        return Item::where('user_id', "=", $userId)->where('id', '=', $id);
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

        $newItem = Item::create([
            'name' => $request->item["name"],
            'user_id' => auth()->user()->id,
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
        $existingItem = Item::find($id);

        if ($existingItem->user_id !== auth()->user()->id) {
            return response()->json('Unauthorized', 401);
        }

        if ( $existingItem ){
            $existingItem->completed = $request->item['completed'] ? true : false;
            $existingItem->important = $request->item['important'] ? true : false;
            $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existingItem->name = $request->item["name"];
            $existingItem->description = $request->item["description"];
            $existingItem->save();
            return $existingItem;
        }

        return "Item not found.";
    }

    public function updateAll(Request $request)
    {
        $data = $request->validate([
            'completed' => 'required|boolean',
        ]);

        Item::where('user_id', auth()->user()->id)->update($data);

        return response()->json('Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Item::find($id);

        if($existingItem->user_id !== auth()->user()->id) {
            return response()->json('Unauthorized', 401);
        }

        if ( $existingItem ){
            $existingItem->delete();
            return 'Item succesfully deleted';
        }
        return 'Item not found';
    }
}
