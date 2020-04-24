<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Refine;
class RefineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');    
        // $this->middleware('permission:permissions');
        // $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        // $this->middleware('permission:permission-update', ['only' => ['edit','update']]);
        // $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

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

        if(!$bills->isEmpty())
        {
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
        }
        else
        {
            $data = 'No bills exists.';
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
        $refine = Refine::where('batchdate', $request->batch_date)->where('batch', $request->Batchnumx)->first();

        if($refine)
        {
            $refine->collection = $request->Collection;
            $refine->receivedweightwithss = $request->receivedweightss;
            $refine->batch = $request->Batchnumx;
            $refine->sample = $request->Sample;
            $refine->puresample = $request->Pure_Sample;
            $refine->refineweight = $request->Refine_Weight;
            $refine->nineninefive = $request->nineninefivepointzero;
            $refine->expectedinc = $request->Expected_INC;
            $refine->refineshort = $request->Refine_Short;
            $refine->toberecovered = $request->To_Be_Recovered;
            $refine->save();
            return 'Refine update successfully!!';
        }
        else
        {
            $refine = new Refine;
            $refine->batchdate = $request->batch_date;
            $refine->collection = $request->Collection;
            $refine->receivedweightwithss = $request->receivedweightss;
            $refine->batch = $request->Batchnumx;
            $refine->sample = $request->Sample;
            $refine->puresample = $request->Pure_Sample;
            $refine->refineweight = $request->Refine_Weight;
            $refine->nineninefive = $request->nineninefivepointzero;
            $refine->expectedinc = $request->Expected_INC;
            $refine->refineshort = $request->Refine_Short;
            $refine->toberecovered = $request->To_Be_Recovered;
            $refine->save();
            return 'Refine save successfully!!';
        }
    }


    public function loadbatch(Request $request)
    {
        $batchdata = Bill::where('billdate', $request->datesort)->where('batchnumber', $request->batchnumber)->get();

        $data = ''; 
        if(!$batchdata->isEmpty())
        {
            $collectionsum = 0;
            $samplesum = 0;
            $puresamplesum = 0;
            $expectedweightsum = 0;
            $tocustomersum = 0;
            $fromcustomersum = 0;
            $refinecweightsum = 0;

            foreach ($batchdata as $batch) 
            {    
                $collectionsum = $collectionsum+$batch->receivedweight;
                $samplesum = $samplesum+$batch->fireassayweight;
                $puresamplesum = $puresamplesum+$batch->puresample;
                $expectedweightsum = $expectedweightsum+$batch->pureweight;
                $tocustomersum = $tocustomersum+$batch->tothecustomer;
                $fromcustomersum = $fromcustomersum+$batch->gain;
                $refinecweightsum = $refinecweightsum+$batch->refinedweight;
            }
            $refineweightsum = $collectionsum - $samplesum;

            $data .= '<br/><div class="table-responsive"><table class="table-mmnn" style="text-align:center; font-weight:bold;"> <tr style="background:black; color:yellow; text-align:center;"><th>Date</th><th>Collection</th><th>Sample</th><th>Pure Sample</th><th>Refine Weight</th><th>Expected Weight</th><th>To The Customer</th><th>From The Customer</th><th>Recieved Weight with SS</th><th>Silver</th><th>Recieved Weight</th><th>Refined Purity %</th><th>Pure Recieved Short</th><th>995</th><th>Expected Inc.</th><th>Refine Short</th><th>To Be Recovered</th><th>Submit</th></tr></thead><tbody><tr style="background:black; color:yellow; text-align:center;"><td><input type="text" id="startdatex" name="startdatex" value="'.$request->datesort.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="collectionsum" name="collectionsum" value="'.$collectionsum.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="samplesum" name="samplesum" value="'.$samplesum.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="puresamplesum" name="puresamplesum" value="'.$puresamplesum.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="refineweightsum" name="refineweightsum" value="'.$refineweightsum.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="expectedweightsum" name="expectedweightsum" value="'.$expectedweightsum.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="tocustomersum" name="tocustomersum" value="'.$tocustomersum.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="fromcustomersum" name="fromcustomersum" value="'.$fromcustomersum.'" class="form-control" style="width: 100%;" required readonly=""></td><td><input type="number" id="receivedweightss" name="receivedweightss" value="0.000" step="0.001" class="form-control" style="width: 100%;" required</td><td><input type="number" id="silver" name="silver" value="0.000" step="0.001" class="form-control" style="width: 100%;" required></td><td><input type="number" id="recievedweight" name="recievedweight" value="0.000" step="0.001" class="form-control" style="width: 100%;" required></td><td><input type="number" id="refinepurity" name="refinepurity" value="0.00" step="0.01" class="form-control" style="width: 100%;" required></td><td><input type="number" id="purerecievedshort" name="purerecievedshort" value="0.000" step="0.001" class="form-control" style="width: 100%;" required></td><td><input type="number" id="nineninefive" name="nineninefive" value="0.000" step="0.001" class="form-control" style="width: 100%;" required></td><td><input type="number" id="expectedinc" name="expectedinc" value="0.000" step="0.001" class="form-control" style="width: 100%;" required></td><td><input type="number" id="refinecweightsum" name="refinecweightsum" value="'.$refinecweightsum.'" step="0.001" hidden required><input type="number" id="refineshort" name="refineshort" value="0.000" step="0.001" class="form-control" style="width: 100%;" required></td><td><input type="number" id="toberecovered" name="toberecovered" value="0.000" step="0.001" class="form-control" style="width: 100%;" required></td><td><button class="btn btn-primary" name="submit_day_refine_total" type="button" id="submit_btn_day_Totalrefine">Submit details</button></td></tr></tbody></table<br/</div>';
        }
        else
        {
            $data = 'No batch exists.';
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function batch(Request $request)
    {
        $batchnum = Bill::where('billdate', $request->qmdatewa)->pluck('batchnumber');
        $data = '';

        if(!$batchnum->isEmpty())
        {
            $data .= '<select name="batchxyzssnm" id="batchxyzssnm">
                       <option selected disbaled>- Select Batch -</option>';
            foreach ($batchnum as $key) 
            {
                $data .= '<option value="'.$key.'">'.$key.'</option>';
            }

            $data .='</select>';
        }
        else
        {
            $data = 'No batch exists.';
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
