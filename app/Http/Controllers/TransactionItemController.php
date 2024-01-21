<?php

namespace App\Http\Controllers;

use App\Item;
use Exception;
use App\Student;
use Illuminate\Http\Request;
use App\Services\SalesService;
use App\Services\SupplierService;
use App\Services\InventoryService;
use Illuminate\Support\Facades\DB;
use App\Services\TransactionService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use App\Services\TransactionItemService;

class TransactionItemController extends Controller
{
    public function __construct(
        private readonly InventoryService $inventoryService,
        private readonly TransactionService $transactionServices,
        private readonly TransactionItemService $transactionItemService,
        private readonly SupplierService $supplierService,


    ) {
        $this->middleware('auth');
    }
    public function purchaseIndex()
    {
        return view('backend.inventory.purchases.index', [
            'purchases' => $this->transactionItemService->getPurchaseList(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function purchaseCreate()
    {
        // enqueue assets in window so that can use from js.
        $suppliers = $this->supplierService->getSupplierList();
        $items = $this->inventoryService->getItemList();

        echo "
        <script>
        window.suppliers = " . json_encode($suppliers) . "
        window.items = " . json_encode($items) . "
        window.csrf_field = '" . csrf_field() . "'
        window.action_route = '" . route('transactionItem.store') . "'
        </script>
        ";

        return view('backend.inventory.purchases.create', [
            'suppliers' => $suppliers,
            'items' => $items,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            $this->transactionItemService->createTransactionItem($request->all());
            if ($request->transactionType === 'purchase') {
                return redirect()->route('purchases.index')
                    ->with('success', ' Successfully.');
            }
            if ($request->transactionType === 'sales') {
                return redirect()->route('sales.index')
                    ->with('success', ' Successfully.');
            }
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function purchaseShow($id)
    {
        $this->transactionServices->findTransactionById($id);
        return view(
            'backend.inventory.purchases.show',
            [
                'transaction' => $this->transactionServices->findTransactionById($id)
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function purchaseEdit($id)
    {
        $purchase = $this->transactionItemService->getTransactionById($id);

        if (!$purchase) {
            abort(404);
        }

        // enqueue assets in window so that can use from js.
        $suppliers = $this->supplierService->getSupplierList();
        $items = $this->inventoryService->getItemList();

        echo "
        <script>
            window.suppliers = " . json_encode($suppliers) . "
            window.items = " . json_encode($items) . "
            window.csrf_field = '" . csrf_field() . "'
            window.action_route = '" . route('transactionItem.update', $id) . "'
        </script>
        ";

        return view('backend.inventory.purchases.edit', [
            'purchase' => $purchase,
            'suppliers' => $suppliers,
            'items' => $items,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->transactionItemService->updateTransactionItem($request->all(), $id);
        return redirect()->back()
            ->with('success', 'Item  created successfully.');
    }

    public function salesIndex()
    {
        return view('backend.inventory.sales.index', [
            'sales' => $this->transactionItemService->getSalesList(),
        ]);
    }

    public function salesCreate()
    {
        $customers = Student::all();
        $items = $this->inventoryService->getItemList();

        echo "
        <script>
        window.customers = " . json_encode($customers) . "
        window.items = " . json_encode($items) . "
        window.csrf_field = '" . csrf_field() . "'
        window.action_route = '" . route('transactionItem.store') . "'
        </script>
        ";

        return view('backend.inventory.sales.create', [
            'customers' => $customers,
            'items' => $items,
        ]);
    }


    // public function salesShow($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function salesEdit($id)
    {
        $sales = $this->transactionItemService->getTransactionById($id);

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
            window.action_route = '" . route('transactionItem.update', $id) . "'
        </script>
        ";

        return view('backend.inventory.sales.edit', [
            'sales' => $sales,
            'customers' => $customers,
            'items' => $items,
        ]);
    }
}