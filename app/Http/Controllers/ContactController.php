<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Services\ContactUsService;

class ContactController extends Controller
{
   public function __construct(
        private readonly ContactUsService $contactService) {
      
    }
    public function index()
    {
        return view('backend.contact.index', [
            'contactsMessage' => $this->contactService->getContactsMessage(),
        ]);
        
    }

    public function create()
    {
        //
    }
    public function status($id)
    {
        $this->contactService->changeMessageStatus(intval($id));
        return redirect()->back()->with('success', 'Status changed successfully!');
        
    }
    public function store(Request $request)
    {
        //
    }

    
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
