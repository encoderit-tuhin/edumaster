<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Services\InventoryService;
use App\Http\Requests\SupplierRequest;
use App\Services\SupplierService;

class SupplierController extends Controller
{

    public function __construct(private readonly SupplierService $supplierService)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->supplierService->getSupplierList();
        return view('backend.inventory.supplier.index', [
            'suppliers' => $this->supplierService->getSupplierList(),
        ]);
    }


    public function create()
    {
        return view('backend.inventory.supplier.create');
    }


    public function store(SupplierRequest $request)
    {
        $this->supplierService->createSupplier($request->validated());
        return redirect()->route('supplier.index')
            ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        if (!$supplier) {
            abort(404);
        }
        return view('backend.inventory.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);
        if (!$supplier) {
            abort(404);
        }
        return view('backend.inventory.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, $id)
    {
        
        $supplier = $this->supplierService->getSupplierById($id);
        if (!$supplier) {
            abort(404);
        }
        // $status = $request->input('status') == "on" ? 1 : 0; // This will be either 'on' or null
        $this->supplierService->updateSupplier($request->all(), $id);
        return redirect()->route('supplier.index')
            ->with('success', 'Supplier created successfully.');
    }
}
