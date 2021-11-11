<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function ClientView(){

        abort_if(Gate::denies('client.view'), 403);

        $data['allData'] = Client::all();

        return view('backend.client.view_client', $data);

    }

    public function ClientAdd(){

        abort_if(Gate::denies('clients.add'), 403);

        return view('backend.client.add_client');

    }

    public function ClientStore(Request $request){

        $validatedData = $request->validate([

            'client_identification' => 'required|unique:clients',
            'client_name' => 'required'

        ]);

        $data = new Client();

        $data->client_identification = $request->client_identification;
        $data->client_name = $request->client_name;
        $data->client_phone = $request->client_phone;
        $data->client_email = $request->client_email;
        $data->client_address = $request->client_address;

        $data->save();

        $notification = array(

            'message' => 'Client Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('client.view')->with($notification);

    }

    public function ClientEdit($id){

        abort_if(Gate::denies('clients.edit'), 403);

        $editData = Client::find($id);
        return view('backend.client.edit_client',compact('editData'));

    }

    public function ClientUpdate(Request $request, $id){

        $data = Client::find($id);

        $data->client_identification = $request->client_identification;
        $data->client_name = $request->client_name;
        $data->client_phone = $request->client_phone;
        $data->client_email = $request->client_email;
        $data->client_address = $request->client_address;

        $data->save();

        $notification = array(

            'message' => 'Client Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('client.view')->with($notification);

    }

    public function ClientDelete($id){

        abort_if(Gate::denies('clients.delete'), 403);

        $client = Client::find($id);
        $client->delete();

        $notification = array(

            'message' => 'Client Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('client.view')->with($notification);

    }
}
