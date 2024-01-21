<?php

namespace App\Http\Controllers;

use App\Sales;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use App\Services\SalesService;
use App\Student;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Laravel\Prompts\Themes\Default\Renderer;

class SalesController extends Controller
{
    public function __construct(
        private readonly SalesService $salesService,
        private readonly InventoryService $inventoryService,
    ) {
        $this->middleware('auth');
    }

    public function index():Renderable
    {
        return view('backend.inventory.sales.index', [
            'sales' => $this->salesService->getTransactions(),
        ]);
    }

    public function create():Renderable
    {
        $customers = Student::all();
        $items = $this->inventoryService->getItemList();

        echo "
        <script>
        window.customers = " . json_encode($customers) . "
        window.items = " . json_encode($items) . "
        window.csrf_field = '" . csrf_field() . "'
        window.action_route = '" . route('sales.store') . "'
        </script>
        ";

        return view('backend.inventory.sales.create', [
            'customers' => $customers,
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {

        try {
            $this->salesService->createTransaction($request->all());
            return redirect()->route('sales.index')
                ->with('success', ' Successfully.');
        } catch (Exception $e) {
            return redirect()->route('sales.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id):Renderable
    {
        return view(
            'backend.inventory.sales.show',
            [
                'transaction' => $this->salesService->getTransactionById($id)
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id):Renderable
    {
        $sales = $this->salesService->getTransactionById($id);

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
            window.action_route = '" . route('sales.update', $id) . "'
            window.removeSalesItemFromList = '" . url('remove-sales-item') . "'

        </script>
        ";

        return view('backend.inventory.sales.edit', [
            'sales' => $sales
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        try {
            $this->salesService->updateTransaction($request->all(), $id);
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', $th->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse

    {
         $this->salesService->delete(intval($id));
         return redirect()->back()
            ->with('success', 'Deleted successfully.');
    }
    public function removeItem($id)
    {
        $this->salesService->deleteItem(intval($id));
        return redirect()->back()
            ->with('success', 'Deleted successfully.');
        //  $this->purchaseService->delete(intval($id));
        //  return redirect()->back()
        //     ->with('success', 'Deleted successfully.');
    }
}