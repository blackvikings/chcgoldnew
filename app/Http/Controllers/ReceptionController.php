<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Party;
use Validator;
use Response;
use Redirect;
use Auth;
class ReceptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();
        $bill = Bill::orderBy('id', 'DESC')->first();
        return view('admin.reception.index', compact('parties', 'bill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_inc' => "required",
            'bill_date' => "required",
            'party_selector' => "required",
            'partyxpercent' => "required",
            'item_name' => "required",
            'before_weight' => "required",
            'after_weight' => "required",
        ]);

        $bill = new Bill;
        $bill->billserial = $request->serial_inc;
        $bill->billdate = $request->bill_date;  
        $bill->party_id = $request->party_selector;
        $bill->partypercentnew = $request->partyxpercent;  
        $bill->itemname =  $request->item_name;
        $bill->beforemeltingweight = $request->before_weight;
        $bill->aftermeltingweight = $request->after_weight;
        $bill->save();
        $notification = array(
            'message' => 'Reception created sucessfully!!', 
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

}
