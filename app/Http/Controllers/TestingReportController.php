<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestingVoucher;
use App\Party;
use Redirect;
class TestingReportController extends Controller
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
        $testingVoucher = TestingVoucher::orderBy('invoiceno', 'desc')->first();
        $invoiceno = 0;
        if($testingVoucher != Null)
        {
            $invoiceno = $testingVoucher->invoiceno+1;
        }
        else
        {
            $invoiceno = 1;
        }
        $parties = Party::all();
        return view('admin.testing-report.index', ['invoiceno' => $invoiceno, 'parties' => $parties]);
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
        $test = new TestingVoucher;
        $test->issueDate = $request->date;
        $test->invoiceno = $request->rnumber;
        $test->party_id = $request->partyId;
        $test->rupees = $request->amount;
        $test->figures = $request->figures;
        $test->words = $request->words;
        $test->save();
        $notification = array(
            'message' => 'Voucher created sucessfully!!', 
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);

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
        $testingVoucher = TestingVoucher::find($id);
        return view('admin.testing-report.invoice', ['testingVoucher' =>$testingVoucher]);
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
        // return $request->all(); 
        $testing = TestingVoucher::where('party_id', $request->partyId)->where('issueDate', $request->voucherdate)->with('party')->get();
        $data = '';
        if (!$testing->isEmpty()) 
        {
            $data .= '<br/><div class="col-md-12" style="color:yellow; background:black;font-weight:bold;"><table class="table table-striped table-ssh"><thead><tr><th>Invoice No.</th><th>Party Name</th><th>Issue Date</th><th>Amount</th><th>Figures</th><th>words</th><th></th></tr></thead><tbody>';
            foreach ($testing as $voucher) {
                // $getPrint = url('/admin/get-testing-vouchers', $voucher->id);
                $getPrint = route('get.voucher.print', $voucher->id);
                $data .= '<tr><td>'.$voucher->invoiceno.'</td><td>'.$voucher->party->partyName.'</td><td>'.$voucher->issueDate.'</td><td>'.$voucher->rupees.'</td><td>'.$voucher->figures.'</td><td>'.$voucher->words.'</td><td><a href="'.$getPrint.'" class="btn btn-primary viewxyx">Get Voucher</a></td></tr>';   
            }
            $data .= '</tbody></table></div>';
        }
        else
        {
            $data .= '<div class="col-md-12" style="color:yellow; background:black;font-weight:bold;">0 results</div>';
        }
        return $data;
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
