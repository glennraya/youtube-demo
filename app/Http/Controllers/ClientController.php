<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Mail\ClientCreatedMail;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming data.
        $validated_data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,12',
        ]);

        // 2. Store the client data.
        Client::create($validated_data);

        // 3. Send a notification email
        Mail::to($validated_data['email'])
            ->send(new ClientCreatedMail());

        return response()->json(['message' => 'Data validated successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
