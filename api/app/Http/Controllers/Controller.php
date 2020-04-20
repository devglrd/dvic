<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function indexProject(Request $request)
    {
        return [
            'data' => DB::table('project')->get()
        ];

    }

    public function storeProject(Request $request)
    {
        DB::table('project')->insert([
            'name' => $request->get('name'),
            'time' => $request->get('time')
        ]);

        return [
            'data' => DB::table('project')->get()
        ];
    }

    public function indexClient(Request $request)
    {
        return [
            'data' => DB::table('client')->get()
        ];
    }

    public function storeClient(Request $request)
    {
        DB::table('client')->insert(['name' => $request->get('name')]);

        return [
            'data' => DB::table('project')->get()
        ];
    }
}
