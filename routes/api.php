<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

// CREATE A USER
Route::post('/users/create', function(Request $request) {
    $data = $request->all();

    if (!User::where('email', '=', $data['email'])->exists()) {
        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"])
        ]);

        if (empty($user->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured"
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "user" => $user
                ]
            ];
        }
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "The user already exists"
            ]
        ];
    }
});

// GET ALL USERS
Route::get("/users/all", function() {
    $users = User::all();

    if (empty($users)) {
        return [
            "success" => false,
            "response" => [
                "error" => "No users found"
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "users" => $users
        ]
    ];
});

// GET A USER
Route::get("/users/{id}", function (Request $request, $id) {
    $user = User::find($id);

    if (empty($user)) {
        return [
            "sucess" => false,
            "reponse" => [
                "error" => "No user found" 
            ]
        ];
    }

    return [
        "success" => true,
        "response" => [
            "user" => $user
        ]
    ];
});

// DELETE USER
Route::delete("/users/delete/{id}", function (Request $request, $id) {
    $user = User::find($id);

    if (empty($user))
    {
        $success = false;
        $response = ["error" => "user could not be deleted."];
    } else {
        if ($user->delete()) {
            $success = true;
            $response = ["message" => "User deleted!"];
        } else {
            $success = false;
            $response = ["error" => "user could not be deleted."];
        }
    }

    return ["success" => $success, "response" => $response];
});

// UPDATE USER
Route::put("/users/update/{id}", function (Request $request, $id) {
    $data = $request->all();

    $user = User::find($id);

    foreach ($data as $key => $value) {
        $user->{$key} = $value;
    }

    if (isset($data["password"])){
        $user->password = Hash::make($data["password"]);
    }

    $result = $user->save();

    return ["success" => $result, "response" => ["user" => $user]];
});