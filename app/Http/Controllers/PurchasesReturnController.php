<?php

namespace App\Http\Controllers;

use Exception;
use App\PurchasesReturn;
use Illuminate\Http\Request;
use App\Services\PurchaseService;
use App\Services\SupplierService;
use App\Services\InventoryService;
use App\Services\PurchasesReturnService;

class PurchasesReturnController extends Controller
{
    public function __construct(
        private readonly InventoryService $inventoryService,
        private readonly PurchasesReturnService $purchasesReturnService,
        private readonly SupplierService $supplierService,
    ) {
        $this->middleware('auth');
    }
   
    public function index()
    {
        return view('backend.inventory.return.purchases.index', [
            'purchases' => $this->purchasesReturnService->getTransactions(),
        ]);
    }

   
    public function create()
    {
        
        
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        
        try {
            $this->purchasesReturnService->createTransaction($request->all());
            return redirect()->route('purchases.index')
                ->with('success', 'Successfully.');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        
        $this->purchasesReturnService->getTransactionById($id);
        return view('backend.inventory.return.purchases.show', [
            'purchases' => $this->purchasesReturnService->getTransactionById($id),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $purchase = $this->purchasesReturnService->getTransactionById($id);

        if (!$purchase) {
            abort(404);
        }

        /** Enqueue assets in window so that can use from js. **/
        $suppliers = $this->supplierService->getSupplierList();
        $items = $this->inventoryService->getItemList();

        echo "
        <script>
            window.suppliers = " . json_encode($suppliers) . "
            window.items = " . json_encode($items) . "
            window.csrf_field = '" . csrf_field() . "'
            window.action_route = '" . route('purchases-return.store') . "'
            window.method_field = '" .  method_field('post') . "'
        </script>
        ";

        return view('backend.inventory.return.purchases.create', [
            'purchase' => $purchase,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchasesReturn $purchasesReturn)
    {
        //
    }
}
