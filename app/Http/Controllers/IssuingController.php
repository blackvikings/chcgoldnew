<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Party;
use App\Bill;
use App\IssueVoucher;

class IssuingController extends Controller
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
        return view('admin.issue.index', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = '';

        if($request->type == 'Debit')
        {
            $data .= '<br/><div class="table-responsive" align="center"><table class="table table-striped table-depositmnop"><tr><th>Received Weight</th><th>Purity %</th><th>Fine Weight</th><th>Remark</th><th>Confirm Deposit</th></tr>
                    <tr><td> <input type="number" id="mdeposit" name="mdeposit" value="0" step="0.001" class="form-control " required> </td><td> <select id="mpurity" class="form-control" style="width: auto;" required><option selected="selected" disbaled>- Select Coin Type -</option><option value="99.5" >995</option><option value="100" >999</option></select></td><td> <input type="number" id="mfine" name="mfine" value="0" step="0.001" class="form-control " required> </td><td><input type="text" id="coinremark" class="form-control" style="width: auto;" required ></td><td> <button class="btn btn-primary" id="msubmit" name="msubmit" type="button">Confirm deposit</button> </td></tr></table></div>';

        }
        else
        {
            $data .= ' <br/><div class="table-responsive" align="center"><table class="table table-striped table-creditmnop"><tr><th>Coin Purity %</th><th>Issued Weight</th><th>Fine Weight</th><th>Remark</th><th>Confirm issued</th></tr><tr><td><select id="cputiry" class="form-control" style="width: auto;" required><option selected="selected" disbaled>- Select Coin Type -</option><option value="99.5" >995</option><option value="100" >999</option></select></td><td><input type="number" id="cissued" value="0" step="0.001" class="form-control" style="width: auto;" required ></td><td><input type="number" id="cfine" value="0" step="0.001" class="form-control" style="width: auto;" required ></td><td><input type="text" id="coinremark" class="form-control" style="width: auto;" required ></td><td> <button class="btn btn-primary" id="csubmit" name="csubmit" type="button">Confirm Issued</button> </td></tr></table></div>';
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

            $issued = new IssueVoucher;
            $issued->issueDate  = date('Y-m-d');
            $iss = IssueVoucher::orderBy('id', 'desc')->first();
            if(!empty($iss) && $iss !== null)
            {
                $issued->invoiceno = $iss->invoiceno+1;
            }
            else
            {
                $issued->invoiceno = 1;
            }
             
            $issued->party_id   =  $request->mparty;
            $issued->issueto    =  $request->remark;
            $issued->particular =  'COIN';
            $issued->purity     =  $request->cputiry;
            $issued->coinweight =  $request->cissued;
            $issued->save();
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $issued = IssueVoucher::orderBy('id', 'desc')->first();
        $partyname = Party::where('id', $issued->party_id)->pluck('partyName')->first();
        return view('admin.issue.invoice', ['issued' => $issued, 'partyName' => $partyname]);
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
        //
    }
}
