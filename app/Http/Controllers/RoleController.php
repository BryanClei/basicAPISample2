<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Response\Response;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(RoleRequest $request)
    {
        $name = $request->input('name');

        $role = Role::create([
            'name' => $name,
        ]);

        return Response::response(Response::CREATED_ROLE, Response::STATUS_OK, new RoleResource($role));

    }

    public function destroy($id)
    {
        $user = Role::findOrFail($id);
        $user->delete();

        return Response::response(Response::DELETE_SUCCESS, Response::STATUS_OK);
    }

    public function restore($id){
        $user = Role::where('id', $id)->withTrashed()->first();
        $user->restore();

        return Response::response(Response::RESTORE_SUCCESS, Response::STATUS_OK);
    }
}
