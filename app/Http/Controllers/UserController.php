<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Red5g\Users\application\command\CreateUserCommand;
use Red5g\Users\application\handlers\CreateUserHandler;
use Red5g\Users\domain\factories\UserFactory;
use Red5g\Users\domain\services\UserService;
use Red5g\Users\infrastructure\database\EloquentUser;

class UserController extends Controller
{
    public function create(Request $request, \App\Models\User $user): \Illuminate\Http\JsonResponse
    {
        try {

           $command = new CreateUserCommand($request->all());
           $handler = new CreateUserHandler(
               userRepository: new EloquentUser(),
               userService: new UserService(),
               userFactory: new UserFactory()
           );
           $response = $handler->handle($command);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $response
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getUsers(\App\Models\User $user): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'users' => $user->all()
        ], 200);
    }
}
