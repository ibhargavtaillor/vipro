<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * load client list
     */
    public function index(Request $request)
    {
        $_data = array(
            "model" => new Client,
        );
        return view("admin.client.index", $_data);
    }

    /**
     * Save Client information
     */
    public function store(Request $request)
    {
        $data = $request->only(['vClientName', 'txAddress', 'vGST']);
        if (Client::isGstAlreatExist($data['vGST'])) {
            $model = new Client;
            $model->fill($data);
            if ($model->save()) {
                session()->flash('success', "Client has been saved successfully");
                return redirect('admin/client');
            } else {
                return redirect("admin/client")->withErrors("Something went wrong failed to save client information");
            }
        } else {
            return redirect('admin/client')->withErrors("GST number is already exist");
        }
    }
}
