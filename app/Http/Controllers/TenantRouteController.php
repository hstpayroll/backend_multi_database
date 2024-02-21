<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantRouteController extends Controller
{
    public function index() {
        return view('tenants.index');
    }

    public function routes(Request $request) {
        if(view()->exists($request->path())) {
            return view($request->path());
        } else {
            return abort(404);
        }
    }
}
