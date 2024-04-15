<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Response\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::create([
            'username' => $username,
            'email' => $email,
            'password' => $password

        ]);

        return Response::response(Response::CREATED_USER, Response::STATUS_OK, new UserResource($user));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return Response::response(Response::DELETE_SUCCESS, Response::STATUS_OK);
    }

    public function restore($id){
        $user = User::where('id', $id)->withTrashed()->first();
        $user->restore();

        return Response::response(Response::RESTORE_SUCCESS, Response::STATUS_OK);
    }
}
