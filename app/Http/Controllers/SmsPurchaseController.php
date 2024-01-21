<?php

namespace App\Http\Controllers;

use App\SmsBalance;
use App\SmsPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmsPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        // $balance= SmsBalance::first();
        $smsPurchases = SmsPurchase::latest()->get();
        return view('backend.sms.sms-purchase.index', compact('smsPurchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sms.sms-purchase.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //
            // dd($request);
            $validatedData = $request->validate([
                'sms_gateway' => 'required|string',
                'masking_type' => 'required|string',
                'transaction_date' => 'required|date',
                'no_of_sms' => 'required|integer',
                'amount' => 'required|numeric',
            ]);
            DB::beginTransaction();
            $purchase = SmsPurchase::create([
                'sms_gateway' => $request->sms_gateway,
                'masking_type' => $request->masking_type,
                'transaction_date' => $request->transaction_date,
                'no_of_sms' => $request->no_of_sms,
                'amount' => $request->amount,
            ]);
            // dd($purchase);  
            if ($purchase) {
                $balance = SmsBalance::first();
                if ($balance) {
                    if ($request->masking_type == 'masking') {
                        $newBalance = $balance->masking_balance + $request->no_of_sms;
                        $balance->masking_balance = $newBalance;
                    } elseif ($request->masking_type == 'nonmasking') {
                        $newBalance = $balance->non_masking_balance + $request->no_of_sms;
                        $balance->non_masking_balance = $newBalance;
                    } else {
                        return back()->with('error', "Something went wrong...");
                    }

                    $balance->save();
                }


            }
            DB::commit();
            return back()->with('success', 'Purchase Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SmsPurchase $smsPurchase)
    {
        //
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchase = SmsPurchase::find($id);
        return view('backend.sms.sms-purchase.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sms_gateway' => 'required|string',
            'masking_type' => 'required|string',
            'transaction_date' => 'required|date',
            'no_of_sms' => 'required|integer',
            'amount' => 'required|numeric',
        ]);
        $purchase = SmsPurchase::find($id);
        if ($purchase) {
            $balance = SmsBalance::first();

            $qtyDifferent = $request->no_of_sms - $purchase->no_of_sms;
            // dd($qtyDifferent);
            if ($request->masking_type == 'masking') {
                $newBalance = $balance->masking_balance + $qtyDifferent;
                $balance->masking_balance = $newBalance;
            } elseif ($request->masking_type == 'nonmasking') {
                $newBalance = $balance->non_masking_balance + $qtyDifferent;
                // dd($newBalance);
                $balance->non_masking_balance = $newBalance;
            } else {
                return back()->with('error', "Something went wrong...");


            }
            $balance->save();

        }
        $purchase->update($validatedData);
        return back()->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SmsPurchase $smsPurchase)
    {
        //
        dd('des');

    }
}
