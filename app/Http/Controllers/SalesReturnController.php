<?php

namespace App\Http\Controllers;

use Exception;
use App\Student;
use App\salesReturn;
use Illuminate\Http\Request;
use App\Services\saleservice;
use App\Services\SupplierService;
use App\Services\InventoryService;
use App\Services\SalesReturnService;

class SalesReturnController extends Controller
{
    public function __construct(
        private readonly InventoryService $inventoryService,
        private readonly SalesReturnService $salesReturnService,
        private readonly SupplierService $supplierService,
    ) {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->salesReturnService->getTransactions();
        return view('backend.inventory.return.sales.index', [
            'sales' => $this->salesReturnService->getTransactions(),
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

        try {
            $this->salesReturnService->createTransaction($request->all());
            return redirect()->route('sales.index')
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
        
        $this->salesReturnService->getTransactionById($id);
        return view('backend.inventory.return.sales.show', [
            'sales' => $this->salesReturnService->getTransactionById($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sales = $this->salesReturnService->getTransactionById($id);

        if (!$sales) {
            abort(404);
        }

        // enqueue assets in window so that can use from js.
        // $customers = $this->salesService->getSupplierList();
        $customers = Student::all();
        $items = $this->inventoryService->getItemList();

        echo "
        <script>
            window.customers = " . json_encode($customers) . "
            window.items = " . json_encode($items) . "
            window.csrf_field = '" . csrf_field() . "'
            window.action_route = '" . route('sales-return.store') . "'
        </script>
        ";

        return view('backend.inventory.return.sales.create', [
            'sales' => $sales,
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
    public function destroy($id)
    {
        //
    }
}
