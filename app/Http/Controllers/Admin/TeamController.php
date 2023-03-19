<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Services\Admin\TeamService;
use Illuminate\Http\Request;
use App\Models\Team;
use Helper;

class TeamController extends Controller
{
    protected $team;

    public function __construct(TeamService $TeamService)
    {
        return $this->team = $TeamService;
    }

    public function index(Request $request)
    {
        $nav = 'team';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $page_title = 'Team Members';
        $result = $this->team->list($per_page, $page, $q);
        return view('admin.team.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        $this->team->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'team';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Team Member" : "Edit Team Member";
        $data['action'] = route('admin-team-addaction');
        $data['order'] = Helper::getMax('teams', 'order');
        $data['row'] = Team::where('id', $id)->first();
        return view('admin.team.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(TeamRequest $request)
    {
        return $this->team->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->team->delete($request);
    }
}
