<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(UserRequest $request)
    {
        $this->store($request->validated());
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(UserRequest $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
