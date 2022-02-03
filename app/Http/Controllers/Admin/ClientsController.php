<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientType = Client::getClientType($request->client_type);
        return view('admin.clients.create', ['client' => new Client(), 'clientType' => $clientType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->_validate($request);

        $data['defaulter'] = $request->has('defaulter');
        $data['client_type'] = Client::getClientType($request->client_type);
        Client::create($data);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) //Route Model Binding Implicitly
    {
        $clientType = $client->client_type;
        return view('admin.clients.edit', compact('client', 'clientType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $this->_validate($request);
        $data['defaulter'] = $request->has('defaulter');

        $client->fill($data);
        $client->save();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    protected function _validate(Request $request)
    {

        $clientType = Client::getClientType($request->client_type);
        $client = $request->route('client');
        $clientId =  $client instanceof Client ? $client->id : null;
        $rules = [
            'name' => 'required|max:255',

            'email' => 'required|email',
            'phone' => 'required',
        ];
        $maritalStatus = implode(',', array_keys(Client::MARITAL_STATUS));

        $rulesIndividual = [
            'document_number' => "required|unique:clients,document_number,$clientId|Cpf", //forma bem melhor q a explicada no curso.. usar  composer require laravellegends/pt-br-validator
            'date_birth' => 'required|date',
            'marital_status' => "required|in:$maritalStatus",
            'sex' => 'required|in:m,f',
            'physical_disability' => 'max:255'
        ];

        $rulesLegal = [
            'company_name' => 'required|max:255',
            'document_number' => "required|unique:clients,document_number,$clientId|Cnpj",
        ];
        return $this->validate($request, $clientType == Client::TYPE_INDIVIDUAL ? $rules + $rulesIndividual : $rules + $rulesLegal);
    }
}
