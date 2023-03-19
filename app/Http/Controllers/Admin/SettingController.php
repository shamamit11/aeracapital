<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Services\Admin\SettingService;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(SettingService $SettingService)
    {
        $this->setting = $SettingService;
    }

    public function index(Request $request)
    {
        $nav = 'setting';
        $sub_nav = '';
        $page_title = 'Site Settings';
        $data['row'] = Setting::first();
        $data['action'] = route('admin-setting-addaction');
        return view('admin.setting.index', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(SettingRequest $request)
    {
        return $this->setting->store($request->validated());
    }
}
