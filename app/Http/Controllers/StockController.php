<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Party;
use App\Refine;

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
        //
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
