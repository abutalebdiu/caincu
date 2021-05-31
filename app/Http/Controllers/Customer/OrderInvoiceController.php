<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Model\Order\SaleInvoice;
use App\Model\Order\SaleInvoiceDetails;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class OrderInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input = $request->except('_token');
        $validator = Validator::make($input,[
            //'sale_date'             => 'required|min:10:max:10',
            'customer_id'               => 'required',
            //'final_sub_total_amount'    => 'required',
            //'order_no'              => 'required|min:2|max:30',
            'product_id.*'              => 'required|max:100',
            //'description.*'         => 'nullable|max:100',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /*
            $y = substr($request->sale_date,6);;
            $d =  substr($request->sale_date,0,2);
            $m = substr($request->sale_date,3,2);
            $date = $y."-".$m."-".$d;
            $sale_date =  date('Y-m-d',strtotime($date));
        */
        $sale_date =  date('Y-m-d h:i:s');
        // Start transaction!
        DB::beginTransaction();
        try {
            $sale = new SaleInvoice();
            $sale->invoice_status   = 1;
            $sale->customer_id      = $request->customer_id;
            
            $sale->sub_total        = $request->total_amount;
            $sale->total_amount        = $request->total_amount;
            $sale->sale_date        = $sale_date;
            $sale->order_status     = 1;
            $sale->save();
            $sale->order_no         = "00".$sale->id;
            $sale->save();
            $qty = 0 ; 
            foreach ($request->product_id as $key => $product_id) 
            {
                $details = new SaleInvoiceDetails();
                $details->sale_invoice_id   = $sale->id;
                $details->customer_id       = $request->customer_id;
                $details->order_no          = $sale->order_no;
                $details->product_id        = $product_id;
                $details->quantity          = $request->quantity[$key];
                $details->unit_price        = $request->price[$key];
                $details->sub_total         = $request->sub_total[$key]; //$request->total_amount;
                $details->sale_date         = $sale_date;
                $details->sale_unit_id      = $request->unit_id[$key];
                $details->save();
                $qty +=  $request->quantity[$key];
            }
            $sale->quantity         = $qty ;
            $sale->save();
            session(['saleCart' => []]);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = "Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$e->getMessage());
        }
        $notification = array(
            'message' => 'Order Processed Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.dashboard')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Order\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Order\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Order\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleInvoice $saleInvoice)
    {
        //
    }
}
