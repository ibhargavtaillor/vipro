<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
    /**
     * load client list
     */
    public function index(Request $request)
    {
        $_data = array(
            "model" => new Client,
            "formUrl" => 'client.store',
            'method' => 'POST',
        );
        return view("admin.client.index", $_data);
    }

    /**
     * Save Client information
     */
    public function store(Request $request)
    {
        $data = $request->only(['vClientName', 'txAddress', 'vGST', 'tiIsOutOfState']);
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

    /**
     * update information
     */
    public function edit(Request $request, Client $client)
    {
        if (!empty($client)) {
            $_data = array(
                "model" => $client,
                "formUrl" => array('client.update', ['client' => $client->iClientMasterId]),
                "method" => "patch",
            );
            return view("admin.client.index", $_data);
        } else {
            return redirect('admin/client/');
        }
    }

    /**
     * update information
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->only('vClientName', 'txAddress', 'vGST');
        $client->fill($data);
        if ($client->save()) {
            session()->flash('success', 'Information has been updates successfully');
            return redirect('admin/client');
        } else {
            return redirect('admin/client')->withErrors("Something went wronf failed to update client information");
        }
    }

    /**
     * Get client list
     */
    public function getClientList(Request $request)
    {
        #code to check whether request is ajax or not
        if ($request->ajax()) {
            return Datatables::of(Client::query()->orderBy('iClientMasterId', 'desc'))
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = "";

                    $editUrl = route('client.edit', ['client' => $row->iClientMasterId]);

                    $html .= "<a href='" . $editUrl . "' ><button data-id='" . $row->iClientMasterId . "' class='btn  btn-info btn-xs waves-effect waves-light' ><i class='fas fa-edit' ></i></button></a>";

                    return $html;
                })
                ->rawColumns(['action', 'enStatus'])
                ->make(true);
        } else {
            return abort(404);
        }
    }

    /**
     * @param Request $request incoming request
     *
     * @description This function is used to get client info
     */
    public function getClient(Request $request)
    {
        if ($request->ajax()) {
            $iClientId = $request->input('iClientId');
            $client = Client::where(['iClientMasterId' => $iClientId])->first();
            $data = array(
                "vClientName" => $client->vClientName,
                "txAddress" => $client->txAddress,
                "vGST" => $client->vGST,
            );
            return response(['code' => '1', 'message' => 'data', 'data' => $data]);
        } else {
            return abort(404);
        }
    }
}
