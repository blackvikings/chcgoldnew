<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
class RefineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.refine.refine');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $bills = Bill::where('billdate', $request->billdate)->where('billserial', '!=', '')->orderBy('batchnumber', 'ASC')->with('party')->get();

        $data = '';

        $data .= '<br/><div class="table-responsive"><table class="table-striped" style="text-align:center; font-weight:bold;"><thead><tr><th>Batch</th><th>Serial No.</th><th>Party Name</th><th>Recieved Weight</th><th>Fire Assay Weight</th><th>Refine Weight</th><th>Assay Purity %</th><th>Purity %</th><th>Difference %</th><th>Refine Charge %</th><th>Pure Sample</th><th>Refined Weight</th><th>Pure Weight</th><th>To the customer</th><th>Gain</th><th>Fine weight</th><th>Fine with Charge</th><th>Total Balance</th><th>Submit Details</th></tr></thead><tbody>';

        $i = 1; 
        foreach ($bills as $bill) 
        {
            if($bill->batchnumber != null){
                $batchxnum = $bill->batchnumber;
            }else{
                $batchxnum = 0;
            }

            $data .= '<tr style="text-align:center;"><form id="my_form"><td><input type="number" id="batchnumber" name="batchnumber" step="1" value="'.$batchxnum.'" style="width:100%;" required></td>
            <td>'.$i.'<input type="text" id="rowid" name="rowid" value="'.$bill->id.'" style="width:100%;"  required hidden></td>
            <td><input type="text" id="party_name" name="party_name" value="'.$bill->party->partyName.'" class="form-control" style="width:auto;"  required readonly=""></td>
            <td><input type="number" id="recieved_weight" name="recieved_weight" step="0.001" value="'.$bill->receivedweight.'" style="width:100%;"  required readonly=""></td>
            <td><input type="number" id="fire_assay_weight" name="fire_assay_weight" step="0.001" value="'.$bill->fireassayweight.'" style="width:100%;"   required readonly=""></td>
            <td><input type="number" id="refine_weight" name="refine_weight" step="0.001" value="'.$bill->refineweight.'" style="width:100%;"  required readonly=""></td>
            <td><input type="number" id="assay_purity" name="assay_purity" step="0.01" value="'.$bill->assaypurity.'" style="width:100%;"   required readonly=""></td>
            <td><input type="number" id="told_purity" name="told_purity" step="0.01" value="'.$bill->clientpurity.'" style="width:100%;"  required></td>
            <td><input type="number" id="purity_difference" name="purity_difference" step="0.01" value="'.$bill->puritydifference.'" style="width:100%;"  required></td>
            <td><input type="number" id="refine_charge" name="refine_charge" step="0.01" value="'.$bill->refinecharge.'" style="width:100%;"  required></td>
            <td><input type="number" id="pure_sample" name="pure_sample" step="0.001" value="'.$bill->puresample.'" style="width:100%;"  required></td>
            <td><input type="number" id="refined_weight" name="refined_weight" step="0.001" value="'.$bill->refinedweight.'" style="width:100%;"  required></td>
            <td><input type="number" id="pure_weight" name="pure_weight" step="0.001" value="'.$bill->pureweight.'" style="width:100%;"  required></td>
            <td><input type="number" id="to_customer_weight" name="to_customer_weight" step="0.001" value="'.$bill->tothecustomer.'" style="width:100%;"  required></td>
            <td><input type="number" id="gain" name="gain" step="0.001" value="'.$bill->gain.'" style="width:100%;"  required></td>
            <td><input type="number" id="fineweight" name="gain" step="0.001" value="'.$bill->fineweight.'" style="width:100%;"  required></td>
            <td><input type="number" id="fineweightwithcharges" name="gain" step="0.001" value="'.$bill->fineweightwithcharge.'" style="width:100%;"  required></td>
            <td><input type="number" id="totalbalance" name="gain" step="0.001" value="'.$bill->totalbalance.'" style="width:100%;"  required></td>
            <td><button class="btn btn-primary" name="submit_day_refine" type="button" id="submit_btn" >Submit details</button></td>
            </form>
          </tr>';

          $i++;
        }

        $data .= '</tbody></table><br/><br/></div><br/>';
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
        $bill = Bill::find($request->rowid);
        $bill->clientpurity = $request->told_purity;
        $bill->batchnumber = $request->batchnumber;
        $bill->puritydifference = $request->purity_difference;
        $bill->refinecharge = $request->refine_charge;
        $bill->puresample = $request->pure_sample; 
        $bill->refinedweight = $request->refined_weight;
        $bill->pureweight = $request->pure_weight;
        $bill->tothecustomer = $request->to_customer_weight;
        $bill->gain = $request->gain;
        $bill->fineweight = $request->fineweight;
        $bill->fineweightwithcharge = $request->fineweightwithcharges;
        $bill->totalbalance = $request->totalbalance;
        $bill->save();
        
        return 'Bill updated successfully!!';
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
