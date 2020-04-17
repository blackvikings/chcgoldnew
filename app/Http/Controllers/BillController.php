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
        $bills = Bill::where('billserial', $request->searchxxzquery)->orWhere('billdate', $request->searchxxzquery)->orWhere('remark', $request->searchxxzquery)->get();

            $data = '';
        


        if($bills->isNotEmpty())
        {
            // echo "Hello";
            foreach ($bills as $bill) {
                $data .= '<br/><div class="col-md-12" style="color:yellow; background:black;font-weight:bold;"><table class="table table-striped table-ssh"><thead><tr><th>Bill Serial</th><th>Item Name</th><th>Date</th><th>Total amount</th><th>Remark</th><th>Edit</th></tr></thead><tbody><tr><td>'.$bill->billserial.'</td><td>'.$bill->itemname.'</td><td>'.$bill->billdate.'</td><td>'.$bill->totalamount.'</td><td>'.$bill->remark.'</td><td><button type="button" class="btn btn-primary viewxyx" id="'.$bill->id.'">View Details</button></td></tr></tbody></table></div>';
            }
        }
        else
        {
            $data .= '<div class="col-md-12" style="color:yellow; background:black;font-weight:bold;">0 results</div>';
        }

        return $data;
    }


    public function fullDetails(Request $request)
    {
        $bill = Bill::where('id', $request->q)->with('party')->first();

        // dd($bill->toArray());
        $date = str_replace('/', '-', $bill->billdate);
        $billdate = date('d-m-Y', strtotime($date));
        $url = route('update.bill', $bill->id);
        // return $billdate; 
        return $data = '<form class="form-horizontal form-material" id="editform" method="POST" enctype="multipart/form-data" action="'.$url.'
        "><input type="hidden" name="_token" value="'.csrf_token().'"><div class="table-responsive"><table class="table table-striped"><tr><td><div class="form-group"><label>Serial No.</label><div class="col-md-8"><input type="number" name="serial_n" class="form-control" value="'.$bill->billserial.'" readonly="" required></div></div></td><td><div class="form-group"><label>Bill Date</label><div class="col-md-8"><input type="text" name="bill_d" class="form-control" value="'.$billdate.'" readonly="" required></div></div></td><td><div class="form-group"><label>Party Name</label><div class="col-md-8"><input type="text" name="party_n" class="form-control" value="'.$bill->party->partyName.'" readonly="" required></div></div></td><td><div class="form-group"><label>Party Percentage</label><div class="col-md-8"><input type="number" name="party_p" step="0.01" value="'.$bill->partypercentnew.'" class="form-control" required></div></div></td></tr><tr><td><div class="form-group"><label>Item Name</label><div class="col-md-8"><input type="text" name="item_n" placeholder="Enter item name here . ." value="'.$bill->itemname.'" class="form-control" required></div></div></td><td><div class="form-group"><label>Before Melting Weight</label><div class="col-md-8"><input type="number" name="before_melting_w" step="0.001" id="BFMW2" value="'.$bill->beforemeltingweight.'" class="form-control" required></div></div></td><td><div class="form-group"><label>After Melting Weight</label><div class="col-md-8"><input type="number" name="after_melting_w" step="0.001" id="AFMW2" value="'.$bill->aftermeltingweight.'" class="form-control" required></div></div></td><td><div class="form-group"><label>Sample Weight</label><div class="col-md-8"><input type="number" name="sample_w" id="SW2" step="0.001" value="'.$bill->sampleweight.'" class="form-control" required></div></div></td></tr><tr><td><div class="form-group"><label>Recieved Weight</label><div class="col-md-8"><input type="number" name="recieved_w" id="RCDW2" step="0.001" value="'.$bill->receivedweight.'" class="form-control" required></div></div></td><td><div class="form-group"><label>Fire Assay Weight</label><div class="col-md-8"><input type="number" name="fire_assay_w" id="FAW2" step="0.001" value="'.$bill->fireassayweight.'" class="form-control" required></div></div></td><td><div class="form-group"><label>Refine Weight</label><div class="col-md-8"><input type="number" name="refine_w" id="RFNW2" step="0.001" value="'.$bill->refineweight.'" class="form-control" required></div></div></td><td><div class="form-group"><label>Purity %</label><div class="col-md-8"><input type="number" name="purity_p" id="PUPT2" step="0.01" value="'.$bill->assaypurity.'" class="form-control" required></div></div></td></tr><tr><td><div class="form-group"><label>CGST %</label><div class="col-md-8"><input type="number" name="cgst_p" id="CGST2" step="0.01" value="'.$bill->cgst.'" class="form-control" required></div></div></td><td><div class="form-group"><label>SGST %</label><div class="col-md-8"><input type="number" name="sgst_p" id="SGST2" step="0.01" value="'.$bill->sgst.'" class="form-control" required></div></div></td><td><div class="form-group"><label>Total Amount</label><div class="col-md-8"><input type="number" name="total_a" id="TAMNT2" step="0.001" value="'.$bill->totalamount.'" class="form-control" required></div></div></td><td><div class="form-group"><label>Remark</label><div class="col-md-8"><input type="text" name="remark_n" placeholder="Enter item name here . ." value="'.$bill->remark.'" class="form-control" required></div></div></td></tr><tr><td colspan="4"><div class="form-group"><div class="col-md-12"><button class="btn btn-primary" name="update_newbill" type="submit" style=" display: block; width: 100%; border: none; padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;">Update bill details</button></div></div></td></tr></table></div></form>';
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
            'message' => 'Bill updated sucessfully!!', 
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
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
