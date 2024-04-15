<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessPermissionRequest;
use App\Http\Resources\AccessPermissionResource;
use App\Models\Access_Permissions;
use App\Response\Response;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function store(AccessPermissionRequest $request)
    {
        $name = $request->input('name');

        $role = Access_Permissions::create([
            'name' => $name,
        ]);

        return Response::response(Response::CREATED_ACCESS, Response::STATUS_OK, new AccessPermissionResource($role));

    }

    public function destroy($id)
    {
        $user = Access_Permissions::findOrFail($id);
        $user->delete();

        return Response::response(Response::DELETE_SUCCESS, Response::STATUS_OK);
    }

    public function restore($id){
        $user = Access_Permissions::where('id', $id)->withTrashed()->first();
        $user->restore();

        return Response::response(Response::RESTORE_SUCCESS, Response::STATUS_OK);
    }
}
