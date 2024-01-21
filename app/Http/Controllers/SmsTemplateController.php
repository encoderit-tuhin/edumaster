<?php

namespace App\Http\Controllers;

use App\SmsTemplate;
use Illuminate\Http\Request;
use App\Services\SmsTemplateService;
use App\Http\Requests\SmsTemplateRequest;

class SmsTemplateController extends Controller
{
    public function __construct(private readonly SmsTemplateService $smsTemplateService)
    {
    }

    public function index()
    {
        return view('backend.sms-template.index', [
            'smsTemplates' => $this->smsTemplateService->getSmsTemplates()
        ]);
    }

    public function store(SmsTemplateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->smsTemplateService->store($request->validated());
        return redirect()->route('sms-template.index')->with('success', 'Sms Template Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $template = $this->smsTemplateService->findById($id);
        if (!$template) {
            return redirect()->route('sms-template.index')->with('error', 'Sms Template Not Found');
        }
        return view('backend.sms-template.show', compact('template'));
    }

    
    public function edit($id)
    {
        $template = $this->smsTemplateService->findById($id);
        if (!$template) {
            return redirect()->route('sms-template.index')->with('error', 'Sms Template Not Found');
        }
        return view('backend.sms-template.edit', compact('template'));
    }

    public function update(SmsTemplateRequest $request,  $id)
    {
        $template = $this->smsTemplateService->findById($id);
        if (!$template) {
            return redirect()->route('sms-template.index')->with('error', 'Sms Template Not Found');
        }
        $this->smsTemplateService->update($request->validated(), $id);
        return redirect()->route('sms-template.index')->with('success', 'Sms Template Updated Successfully');
    }

    public function destroy($id)
    {
        $template = $this->smsTemplateService->findById($id);
        if (!$template) {
            return redirect()->route('sms-template.index')->with('error', 'Sms Template Not Found');
        }
        $this->smsTemplateService->delete($id);
        return redirect()->route('sms-template.index')->with('success', 'Sms Template Deleted Successfully');
    }
}
