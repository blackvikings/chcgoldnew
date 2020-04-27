<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Party;
use App\Refine;
use App\Bill;

class StockController extends Controller
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
        return view('admin.stock.stock', ['parties' => $parties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $refines = Refine::whereMonth('batchdate', $request->month)->whereYear('batchdate', Carbon::now()->year)->get();
        $data = '';

        if(!$refines->isEmpty())
        {
            $data .= '<br/><div class="table-responsive"><table class="table-stock" id="table-stripedxyz" style="font-weight:bold;"><thead><tr><th>Batch Date</th><th>Batch</th><th>Received With with ss</th><th>Coin Stock</th><th>Coin Type</th><th>Loss</th><th>Update Data</th></tr></thead><tbody>';
            $i = 1;
            foreach ($refines as $refine) 
            {
                $data .= '<tr class="mnkliop" id="'.$i.'"><form id="my_form"><td><input type="text" id="batchdatex" name="party_name" value="'.$refine->batchdate.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="text" id="batchkramank" name="party_name" value="'.$refine->batch.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="receivedwithss" name="party_name" value="'.$refine->receivedweightwithss.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="stockcoin" name="party_name" value="'.$refine->coinstock.'" step="0.001"  class="form-control" style="width: 100%;" required></td><!--<td><input type="number" id="cointype" name="party_name" value="'.$refine->cointype.'" class="form-control" style="width: 100%;" required></td>--><td><select id="cointype" class="form-control" style="width: 100%;" required><option '; 
                if(($refine->cointype!="99.5")||($refine->cointype!="100")) 
                    $data.= 'selected="selected"'; 
                $data .= ' disbaled>- Select Coin Type -</option><option value="99.5" '; 
                if($refine->cointype =="99.5") 
                    $data .= 'selected="selected"'; 
                $data .= '>995</option><option value="100" '; 
                if($refine->cointype =="100") 
                    $data .= 'selected="selected"'; 
                $data .= '>999</option></select></td><td><input type="number" id="expectedloss" name="party_name" value="'.$refine->loss.'" step="0.001" class="form-control" style="width: 100%;" required></td><td><button type="button" data-id="'.$refine->id.'" id="update_datax" name="update_datax" class="btn btn-primary" style="width: 100%;">Update Data</button></td></form></tr>';
            }

            $data .= '</tbody></table></div>';
        }
        else
        {
            $data = 'Data not found';
        }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = '';
        if ($request->has('msubmit')) 
        {
            $bill = new Bill;
            $bill->receivedweight = $request->mdeposit;
            $bill->party_id = $request->mparty;
            $bill->clientpurity = $request->mpurity;
            $bill->fineweight = $request->mfine;
            $bill->billdate = date('Y-m-d');
            $bill->totalbalance = $request->mfine;
            $bill->description = 'coin deposited by client';
            $bill->coinremark = $request->remark;
            $bill->save();
            $data = 'conin deposited successfully!!';
        }
        else
        {
            $bill = new Bill;
            $bill->coinissuedweight = $request->cissued;
            $bill->party_id = $request->mparty;
            $bill->cointype = $request->cputiry;
            $bill->fineweight = $request->cfine;
            $bill->billdate = date('Y-m-d');
            $bill->issueddate = date('Y-m-d');
            $bill->totalbalance = '-'.$request->cfine;
            $bill->description = 'coin issued to client';
            $bill->coinremark = $request->remark;
            $bill->save();
            $data = 'coin issued to client!!';
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function account(Request $request)
    {
        if ($request->type == 'Debit') {
            $data = '<br/><from method="POST" action="javascript:void(0)"><div class="table-responsive" align="center"><table class="table table-striped table-depositmnop"><tr><th>Received Weight</th><th>Purity %</th><th>Fine Weight</th><th>Remark</th><th>Confirm Deposit</th></tr><tr><td> <input type="number" id="mdeposit" name="mdeposit" value="0" step="0.001" class="form-control " required> </td><td><select id="mpurity" class="form-control" style="width: auto;" required><option selected="selected" disbaled>- Select Coin Type -</option><option value="99.5" >995</option><option value="100" >999</option></select></td><td> <input type="number" id="mfine" name="mfine" value="0" step="0.001" class="form-control " required> </td><td> <input type="text" id="coinremark" name="coinremark" class="form-control " required> </td><td> <button class="btn btn-primary" id="msubmit" name="msubmit" type="button">Confirm deposit</button> </td></tr></table></from></div>';
        }
        elseif ($request->type=="Credit") {
            $data = '<br/><div class="table-responsive" align="center"><table class="table table-striped table-creditmnop"><tr><th>Coin Purity %</th><th>Issued Weight</th><th>Fine Weight</th><th>Remark</th><th>Confirm issued</th></tr><tr><td><select id="cputiry" class="form-control" style="width: auto;" required><option selected="selected" disbaled>- Select Coin Type -</option><option value="99.5" >995</option><option value="100" >999</option></select></td><td><input type="number" id="cissued" value="0" step="0.001" class="form-control" style="width: auto;" required ></td><td><input type="number" id="cfine" value="0" step="0.001" class="form-control" style="width: auto;" required ></td><td> <input type="text" id="coinremark" name="coinremark" class="form-control " required> </td><td> <button class="btn btn-primary" id="csubmit" name="csubmit" type="button">Confirm Issued</button> </td></tr></table></div>';
        }
        return $data;
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
    public function update(Request $request)
    {
        $refine = Refine::find($request->id);
        $refine->coinstock = $request->stockdata;
        $refine->cointype = $request->cointype;
        $refine->loss = $request->lossx;
        $refine->save();

        return 'Stock update successfully.';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
