<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Party;
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use Auth;
class BillController extends Controller
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
        return view('admin.billing.receiving', compact('parties', 'bill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function partyParameter(Request $request)
    {
        $party = Party::find($request->pcs);
        return $party;
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
            'sample_weight' => "required",
            'recieved_weight' => "required",
            'fire_assay_weight' => "required",
            'refine_weight' => "required",
            'purity_percentage' => "required",
            'cgst_percent' => "required",
            'sgst_percent' => "required",
            'total_amount' => "required",
            'remarks' => "required",
        ]);

        $bill = new Bill;
        $bill->billserial = $request->serial_inc;
        $bill->billdate = $request->bill_date;  
        $bill->party_id = $request->party_selector;
        $bill->partypercentnew = $request->partyxpercent;  
        $bill->itemname =  $request->item_name;
        $bill->beforemeltingweight = $request->before_weight;
        $bill->aftermeltingweight = $request->after_weight; 
        $bill->sampleweight = $request->sample_weight; 
        $bill->receivedweight = $request->recieved_weight; 
        $bill->fireassayweight = $request->fire_assay_weight; 
        $bill->refineweight = $request->refine_weight; 
        $bill->assaypurity = $request->purity_percentage; 
        $bill->cgst = $request->cgst_percent; 
        $bill->sgst = $request->sgst_percent; 
        $bill->totalamount = $request->total_amount; 
        $bill->remark = $request->remarks; 
        $bill->save();
        $notification = array(
            'message' => 'Bill created sucessfully!!', 
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->all();
        // $bill = Bill::
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return view('admin.billing.editrecieve');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
