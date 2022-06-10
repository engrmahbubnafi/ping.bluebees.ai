<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipientRequest;
use App\Http\Requests\UpdateRecipientRequest;
use App\Models\Recipient;

class RecipientController extends Controller
{
    /**
     * Display a listing of the recipients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipients = Recipient::all();

        return view('recipients.index', compact('recipients'));
    }

    /**
     * Show the form for creating a new recipient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipients.create');
    }

    /**
     * Store a newly created recipient in storage.
     *
     * @param  \App\Http\Requests\StoreRecipientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipientRequest $request)
    {
        $attributes = $request->validated();

        // Set status to 'Active' by default.
        $attributes['status'] = 1;

        Recipient::create($attributes);

        return back()->with('flash_message', 'New recipient created!');
    }

    /**
     * Show the form for editing the specified recipient.
     *
     * @param  App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipient $recipient)
    {
        return view('recipients.edit', compact('recipient'));
    }

    /**
     * Update the specified recipient in storage.
     *
     * @param  App\Http\Requests\UpdateRecipientRequest  $request
     * @param  App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipientRequest $request, Recipient $recipient)
    {
        $attributes = $request->validated();

        $recipient->update($attributes);

        return back()->with('flash_message', 'Recipient updated!');
    }

    /**
     * Remove the specified recipient from storage.
     *
     * @param  App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipient $recipient)
    {
        $recipient->delete();

        return redirect('recipients')->with('flash_message', 'Recipient deleted!');
    }

    /**
     * Change the status of a specified recipient.
     *
     * @param  App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Recipient $recipient)
    {
        if ($recipient->status == 1) {
            $recipient->status = 0;
        } elseif ($recipient->status == 0) {
            $recipient->status = 1;
        }

        $recipient->update();

        return redirect('recipients')->with('flash_message', 'Status changed!');
    }
}