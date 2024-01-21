<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\SupplierService;
use App\Services\InventoryService;
use App\Services\PurchaseService;
use Illuminate\Contracts\Support\Renderable;


class PurchasesController extends Controller
{
    public function __construct(
        private readonly InventoryService $inventoryService,
        private readonly PurchaseService $purchaseService,
        private readonly SupplierService $supplierService,
    ) {
        $this->middleware('auth');
    }

    public function index(): Renderable
    {
        return view('backend.inventory.purchases.index', [
            'purchases' => $this->purchaseService->getTransactions(),
        ]);
    }

    public function create(): Renderable
    {
        // enqueue assets in window so that can use from js.
        $suppliers = $this->supplierService->getSupplierList();
        $items = $this->inventoryService->getItemList();

        echo "
        <script>
            window.suppliers = " . json_encode($suppliers) . "
            window.items = " . json_encode($items) . "
            window.csrf_field = '" . csrf_field() . "'
            window.action_route = '" . route('purchases.store') . "'
        </script>
        ";

        return view('backend.inventory.purchases.create');
    }

    public function store(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        try {
            $this->purchaseService->createTransaction($request->all());
            return redirect()->route('purchases.index')
                ->with('success', 'Successfully.');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function show($id): Renderable
    {
        return view(
            'backend.inventory.purchases.show',
            [
                'transaction' => $this->purchaseService->getTransactionById($id)
            ]
        );
    }

    public function edit($id): Renderable
    {
        $purchase = $this->purchaseService->getTransactionById($id);

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
            window.action_route = '" . route('purchases.update', $id) . "'
            window.removePurchaseItemFromList = '" . url('remove-purchase-item') . "'
        </script>
        ";

        return view('backend.inventory.purchases.edit', [
            'purchase' => $purchase,
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        try {
            $this->purchaseService->updateTransaction($request->all(), $id);
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', $th->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Purchases  Updated successfully.');
    }

    public function destroy($id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse

    {
        $this->purchaseService->delete(intval($id));
        return redirect()->back()
            ->with('success', 'Deleted successfully.');
    }
    public function removeItem($id)
    {
        $this->purchaseService->deleteItem(intval($id));
        return redirect()->back()
            ->with('success', 'Deleted successfully.');
        //  $this->purchaseService->delete(intval($id));
        //  return redirect()->back()
        //     ->with('success', 'Deleted successfully.');
    }
}
