<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manage-party.index');
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
        if($request->ajax())
        {
            $rules = array(
                'partyname' => "required|string|unique:parties|max:250",
                'partycontact' => "required|numeric",
                'partygst' => "required",
                'partypercent' => "required"
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Response::json(array(
                    "errors" => $validator->getMessageBag()->toArray()
                ));
            }
            else
            {
                $party = new Party;
                $party->partyName = $request->partyname;
                $party->partyContact = $request->partycontact;  
                $party->partyGstin = $request->partygst;  
                $party->partyPercentage = $request->partypercent;
                $store = rand(10,100);  
                $party->partyId = md5($request->partypercent.$store); 
                $party->save();

                return Response::json($party);
            }
        }
        else
        {
            return Response::json(array('error' => "response was not JSON" ));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        //
    }
}
