<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Party;
use App\Bill;

class LedgerController extends Controller
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
        return view('admin.ledger.ledger', ['parties' => $parties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ledgers = Bill::where('party_id', $request->editparty_selectorledger)->whereBetween('billdate', [$request->start_date, $request->end_date])->get();
        $data = '';
        $ledgerbal = 0;
        if(!$ledgers->isEmpty())
        {
            $data .= '<br/><div class="table-responsive" align="center"><table class="table table-striped table-depositxyz"><tr><th>Description</th><th>Batch Date</th><th>Issued Date</th><th>Received Weight</th><th>Purity %</th><th>Fine with Charge</th><th>Coin Type</th><th>Coin Issued</th><th>Total Balance</th><th>Remark</th></tr>';
            foreach ($ledgers as $ledger) 
            {
                $ledgerbal += $ledger->totalbalance;


                $data .= '<tr><td>'.$ledger->description.'</td><td>'.$ledger->billdate.'</td><td>'.$ledger->issueddate.'</td><td>'.$ledger->receivedweight.'</td><td>'.$ledger->clientpurity.'</td><td>'.$ledger->fineweightwithcharge.'</td><td>'.$ledger->cointype.'</td><td>'.$ledger->coinissuedweight.'</td><td>'.$ledger->totalbalance.'</td><td>'.$ledger->coinremark.'</td></tr>';  
            }
            $data .= '<tr style="font-weight:bold; color:yellow; background:black;"><td colspan="8" align="right">Balance till date &emsp;<small>(+) Debit, (-) Credit </small>&emsp;</td><td>'.$ledgerbal.'</td><td></td></tr></table></div>';
        }
        else
        {
            $data .= 'No data found';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
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
