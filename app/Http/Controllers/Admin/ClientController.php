<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientRequest;
use App\Services\Admin\ClientService;
use Illuminate\Http\Request;
use App\Models\Client;
use Helper;

class ClientController extends Controller
{
    protected $client;

    public function __construct(ClientService $ClientService)
    {
        return $this->client = $ClientService;
    }

    public function index(Request $request)
    {
        $nav = 'client';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $page_title = 'Clients';
        $result = $this->client->list($per_page, $page, $q);
        return view('admin.client.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        $this->client->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'client';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Client" : "Edit Client";
        $data['action'] = route('admin-client-addaction');
        $data['order'] = Helper::getMax('clients', 'order');
        $data['row'] = Client::where('id', $id)->first();
        return view('admin.client.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(ClientRequest $request)
    {
        return $this->client->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->client->delete($request);
    }
}
