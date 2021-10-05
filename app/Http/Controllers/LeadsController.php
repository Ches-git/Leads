<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;


//use Ramsey/Uuid/Uuid;
class LeadsController extends Controller
{
    public function index()
    {
        return Lead::all();
//        return lead::where('user_id', auth()->user()->id)->get();
    }

    public function store(Request $request)
    {

        $newLead = Lead::create([
            'name' => $request->lead["name"],
//            'user_id' => auth()->user()->id;
            'email' => $request->lead["email"],
            'telephone' => $request->lead["telephone"],
            'date' => $request->lead["date"],
            'time_landing' => $request->lead["time_landing"],
            'time' => $request->lead["time"],
            'aktion' => $request->lead["aktion"],
            'quelle' => $request->lead["quelle"],
            'call_to_action' => $request->lead["call_to_action"],
            'page' => $request->lead["page"],
            'url' => $request->lead["url"],
            'status' => $request->lead["status"],
            'guid' => (string)Str::uuid(),
        ]);

        return response($newLead, 201);

    }


    public function update(Request $request, $id)
    {
        $existingLead = Lead::find($id);

//        if ($existingItem->user_id !== auth()->user()->id) {
//            return response()->json('Unauthorized', 401);
//        }

        if ( $existingLead ){
            $existingLead->name = $request->lead["name"];
            $existingLead->email = $request->lead["email"];
            $existingLead->telephone = $request->lead["telephone"];
            $existingLead->date = $request->lead["date"];
            $existingLead->time_landing = $request->lead["time_landing"];
            $existingLead->time = $request->lead["time"];
            $existingLead->aktion = $request->lead["aktion"];
            $existingLead->quelle = $request->lead["quelle"];
            $existingLead->call_to_action = $request->lead["call_to_action"];
            $existingLead->page = $request->lead["page"];
            $existingLead->url = $request->lead["url"];
            $existingLead->status = $request->lead["status"];
            $existingLead->resubmission = $request->lead['resubmission'];

            $existingLead->save();
            return $existingLead;
        }

        return "Item not found.";
    }

    public function destroy($id)
    {
        $existingLead = Lead::find($id);

//        if($existingItem->user_id !== auth()->user()->id) {
//            return response()->json('Unauthorized', 401);
//        }

        if ( $existingLead ){
            $existingLead->delete();
            return 'Item succesfully deleted';
        }
        return 'Item not found';
    }

}
