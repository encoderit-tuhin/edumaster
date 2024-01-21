<?php

namespace App\Http\Controllers;

use App\Committee;
use Illuminate\Http\Request;
use App\Services\CommitteeService;
use App\Http\Requests\committeeRequest;

class CommitteeController extends Controller
{
    public function __construct(private readonly CommitteeService $committeeService)
    {
    }
    public function index()
    {
        return view('backend.committee.index', [
            'committees' => $this->committeeService->getCommitteeMembers(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.committee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(committeeRequest $request)
    {
        //
        $this->committeeService->store($request->validated());
        return redirect()->route('committee.index')->with('success', 'Committee Member Added Successfully');
    }

    
    public function edit($id)
    {
         $committee = $this->committeeService->findById((int)$id);
        if (!$committee) {
            return redirect()->route('committee.index')->with('error', 'Committee Member Not Found');
        }
        return view('backend.committee.edit', compact('committee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(committeeRequest $request,$id)
    {
         $committee = $this->committeeService->findById($id);
        if (!$committee) {
            return redirect()->route('committee.index')->with('error', 'Committee Member Not Found');
        }
        $this->committeeService->update($request->validated(), $id);
        return redirect()->route('committee.index')->with('success', 'Committee Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $committee = $this->committeeService->findById((int)$id);
        if (!$committee) {
            return redirect()->route('committee.index')->with('error', 'Committee Member Not Found');
        }
        $this->committeeService->delete((int)$id);
        return redirect()->route('committee.index')->with('success', 'Committee Member Deleted Successfully');
    }
}
