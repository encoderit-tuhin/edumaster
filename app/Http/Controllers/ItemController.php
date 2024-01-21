<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryItemRequest;
use App\Item;
use App\ItemCategory;
use Illuminate\Http\Request;
use App\Services\InventoryService;

class ItemController extends Controller
{

    public function __construct(private readonly InventoryService $inventoryService)
    {
    }
    public function index()
    {
        return view(
            'backend.inventory.item.index',
            [
                'items' => $this->inventoryService->getItemList(),
                'categories' => $this->inventoryService->getCategoryList(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.inventory.item.create', [
            'categories' => $this->inventoryService->getCategoryList(),
        ]);
    }


    public function store(InventoryItemRequest $request)
    {
        $item = $this->inventoryService->createItem($request->validated());
        if (!$item) {
            return redirect()->route('item.index')->with('error', 'Something went wrong. Item can not be created.');
        }
        return redirect()->route('item.index')
            ->with('success', 'Item  created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = $this->inventoryService->getItemById($id);
        if (!$item) {
            abort(404);
        }
        return view('backend.inventory.item.show', compact('itemCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = $this->inventoryService->getItemById($id);
        if (!$item) {
            abort(404);
        }
        return view('backend.inventory.item.edit', [
            'item' => $item,
            'categories' => $this->inventoryService->getCategoryList(),
        ]);
    }


    public function update(InventoryItemRequest $request, $id)
    {
        $item = $this->inventoryService->getItemById($id);
        if (!$item) {
            abort(404);
        }
        $status = $request->input('status') == "on" ? 1 : 0;
        $this->inventoryService->updateItem($request->validated(), $id, $status);
        return redirect()->route('item.index')
            ->with('success', 'Item 4 created successfully.');
    }
}
