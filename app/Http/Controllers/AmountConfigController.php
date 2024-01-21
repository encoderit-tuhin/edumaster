<?php

namespace App\Http\Controllers;

use App\Services\FeeService;
use Illuminate\Http\Request;
use App\Services\SectionService;
use App\Services\AbsentFineService;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class AmountConfigController extends Controller
{
    public function __construct(
        private readonly SectionService $sectionService,
        private readonly FeeService $feeService,
        private readonly AbsentFineService $absentFineService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.amount_config.index', [
            'sections' => $this->sectionService->getSections(),
            'fees' => $this->feeService->getFees(),
            'absentFines' => $this->absentFineService->getAbsentFines(),
        ]);
    }

    public function store(Request $request)
    {
        // 
    }
}
