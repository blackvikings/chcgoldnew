<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Party;
use App\Bill;
use App\Refine;
use App\Ledger;

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
        $fyyear = $request->fyyear;
        $mainyear = explode("-",$fyyear);
        //echo $mainyear[0];
        $startdate = $mainyear[0]."-04-01";
        $enddate = $mainyear[1]."-03-31";
        
        $stock995 = 0;
        $stock100 = 0;
        $refinestock995 = 0;
        $refinestock100 = 0;
        $clientstck995 = 0;
        $clientstck100 = 0;
        $clientdpst995 = 0;
        $clientdpst100 = 0;

        $refines = Refine::whereBetween('batchdate',[$startdate, $enddate])->get();

        if (!$refines->isEmpty()) 
        {
            foreach ($refines as $refine) 
            {
                if($refine->cointype == 99.5 || $refine->cointype == 99.50)
                { 
                    $refinestock995 = $refinestock995 + $refine->coinstock; 
                }
                else if($refine->cointype == 100)
                { 
                    $refinestock100 = $refinestock100 + $refine->coinstock; 
                }    
            }
        }

        $bills = Bill::whereBetween('billdate', [$startdate, $enddate])->get();

        if(!$bills->isEmpty())
        {
            foreach ($bills as $bill) 
            {
                if($bill->description == 'coin issued to client')
                {
                    if($bill->cointype == 99.5)
                    { 
                        $clientstck995 = $clientstck995 + $refine->coinissuedweight; 
                    }
                    elseif($refine->cointype == 100)
                    { 
                        $clientstck100 = $clientstck100 + $refine->coinissuedweight; 
                    }
                } 
                else 
                {
                    if($refine->description == 'coin deposited by client')
                    {
                        if($refine->clientpurity == 99.5)
                        { 
                            $clientdpst995 = $clientdpst995 + $refine->receivedweight; 
                        }
                        elseif($refine->clientpurity == 100)
                        { 
                            $clientdpst100 = $clientdpst100 + $refine->receivedweight; 
                        }
                    }    
                }
            }
        }

        $ledgers = Ledger::where('financialyear', $fyyear)->get();

        if(!$ledgers->isEmpty())
        {
            foreach ($ledgers as $ledger) 
            {
                if($refine->cointype == 99.5)
                {
                    $stock995 = $leger->openingcoinweight;
                } 
                elseif($refine->cointype == 100)
                { 
                    $stock100 = $ledger->openingcoinweight;
                }
            }
        }

        $restock995 = $stock995+$refinestock995+$clientdpst995-$clientstck995;
        $restock100 = $stock100+$refinestock100+$clientdpst100-$clientstck100;

        return $data = '<div class="table-responsive" align="center"><table class="table table-striped"><tr><th>Coin Purity %</th><th>Opening Stock</th><th>Refine Deposited</th><th>Coin Deposited</th><th>Coin Issued</th><th>Closing Stock</th></tr><tr><td>995</td><td>'.$stock995.'</td><td>'.$refinestock995.'</td><td>'.$clientdpst995.'</td><td>'.$clientstck995.'</td><td>'.$restock995.'</td></tr><tr><td>100</td><td>'.$stock100.'</td><td>'.$refinestock100.'</td><td>'.$clientdpst100.'</td><td>'.$clientstck100.'</td><td>'.$restock100.'</td></tr></table></div>';

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
