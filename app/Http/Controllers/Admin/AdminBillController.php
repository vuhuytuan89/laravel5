<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Bill;
class AdminBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'Quản lý hóa đơn';
        $customers = DB::table('customers')
                    ->orderBy('id', 'desc')
                    ->get();
        $this->data['customers'] = $customers;
        return view('admin.bill.index', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //DB::enableQueryLog();
        $customerInfo = DB::table('customers')
                        ->join('bills', 'customers.id', '=', 'bills.customer_id')
                        ->select('customers.*', 'bills.id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status as bill_status')
                        ->where('customers.id', '=', $id)
                        ->first();

        $billInfo = DB::table('bills')
                    ->join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
                    ->leftjoin('products', 'bill_details.product_id', '=', 'products.id')
                    ->where('bills.customer_id', '=', $id)
                    ->select('bills.*', 'bill_details.*', 'products.name as product_name')
                    ->get();
        //var_dump(DB::getQueryLog());
        //var_dump($customerInfo);die();
        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;

        return view('admin.bill.edit', $this->data);
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
        $bill = Bill::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        Session::flash('message', "Successfully updated");

        return Redirect::to('admincp/bill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        Session::flash('message', "Successfully deleted");

        return Redirect::to('admincp/bill');
    }
}
