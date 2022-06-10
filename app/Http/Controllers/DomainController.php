<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDomainRequest;
use App\Http\Requests\UpdateDomainRequest;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of all the domain info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::all();

        return view('domains.index', compact('domains'));
    }

    /**
     * Show the form for creating a new domain info.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domains.create');
    }

    /**
     * Store a newly created domain in storage.
     *
     * @param  App\Http\Requests\StoreDomainRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDomainRequest $request)
    {
        $attributes = $request->validated();

        Domain::create($attributes);

        return back()->with('flash_message', 'New domain created!');
    }

    /**
     * Show the form for editing the specified domain info.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        return view('domains.edit', compact('domain'));
    }

    /**
     * Update the specified domain info in storage.
     *
     * @param  App\Http\Requests\UpdateDomainRequest  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDomainRequest $request, Domain $domain)
    {
        $attributes = $request->validated();

        $domain->update($attributes);

        return back()->with('flash_message', 'Domain updated!');
    }

    /**
     * Remove the specified domain info from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();

        return redirect('domains')->with('flash_message', 'Domain deleted!');
    }
}