<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use Illuminate\Http\Request;
use App\Services\InventoryService;
use App\Http\Requests\InventoryCategoryRequest;
use App\Http\Requests\InventoryItemCategoryRequest;

class ItemCategoryController extends Controller
{
    public function __construct(private readonly InventoryService $inventoryService)
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('backend.inventory.category.index', ['categories' => $this->inventoryService->getCategoryList()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.inventory.category.create');
    }

    public function store(InventoryCategoryRequest $request)
    {
        $this->inventoryService->createCategory($request->validated());
        return redirect()->route('item-category.index')
            ->with('success', 'Item Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = $this->inventoryService->getCategoryById($id);
        if (!$category) {
            abort(404);
        }
        return view('backend.inventory.category.show', compact('itemCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->inventoryService->getCategoryById($id);
        if (!$category) {
            abort(404);
        }
        return view('backend.inventory.category.edit', compact('category'));
    }


    public function update(InventoryCategoryRequest $request, $id)
    {
        $category = $this->inventoryService->getCategoryById($id);
        if (!$category) {
            abort(404);
        }

        $status = $request->input('status') == "on" ? 1 : 0; // This will be either 'on' or null
        $category = $this->inventoryService->updateCategory($request->validated(), $id);



        return redirect()->route('item-category.index')
            ->with('success', 'Item Category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $itemCategory = ItemCategory::find($id);
        if (!$itemCategory) {
            abort(404);
        }
        $itemCategory->delete();
    }
}