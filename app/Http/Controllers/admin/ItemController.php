<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Items;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ItemController extends Controller
{

    /**
     * @description This function is used to
     */
    public function index()
    {
        $_data = array(
            'model' => new Items,
            'formUrl' => 'item.store',
            'method' => 'post',
        );
        return view("admin.item.index", $_data);
    }

    /**
     * edit item
     */
    public function edit(Items $item)
    {
        $_data = array(
            'model' => $item,
            'formUrl' => array('item.update', ['item' => $item->iItemMasterId]),
            'method' => 'put',
        );
        return view("admin.item.index", $_data);
    }

    /**
     * update item
     */
    public function update(Request $request, Items $item)
    {
        $data = $request->only(['vTitle', 'dcPrice']);
        $item->fill($data);
        if($item->save()) {
            session()->flash('success', 'Item has been updated successfully');
            return redirect('admin/item');
        } else {
            return redirect('admin/item')->withErrors("Failed to update Item detail");
        }
    }

    /**
     * Store Item Information
     */
    public function store(Request $request)
    {
        $data = $request->only(['vTitle', 'dcPrice']);
        $model = new Items;
        $model->fill($data);
        if ($model->save()) {
            session()->flash('success', 'Item has been save successfully');
            return redirect('admin/item');
        } else {
            return redirect('admin/item')->withErrors("Failed to save Item detail");
        }
    }

    /**
     * Get client list
     */
    public function getItemList(Request $request)
    {
        #code to check whether request is ajax or not
        if ($request->ajax()) {
            return Datatables::of(Items::query()->orderBy('iItemMasterId', 'desc'))
                ->addIndexColumn()
                ->addColumn("dcPrice", function ($row) {
                    return number_format($row->dcPrice, 2) . '/-';
                })
                ->addColumn('action', function ($row) {
                    $html = "";

                    $editUrl = route('item.edit', ['item' => $row->iItemMasterId]);
                    $html .= "<a href='" . $editUrl . "' ><button data-id='" . $row->iItemMasterId . "' class='btn  btn-info btn-xs waves-effect waves-light' ><i class='fas fa-edit' ></i></button></a>";

                    return $html;
                })
                ->rawColumns(['action', 'enStatus'])
                ->make(true);
        } else {
            return abort(404);
        }
    }
}
