<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\EasyValidationTrait;

class UserController extends Controller
{

    use EasyValidationTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        $form = $request->all();

        $users = User::search($form)->get();

        return response()->json([
            'status' => true,
            'rows' => $users,
            'total' => $users->count()
        ]);
    }

    public function show($id)
    {
        
    }

    public function store(Request $request)
    {
        $form = $request->all();

        $this->easyValidate($form, User::$rules);

        $user = User::create($form);

        return response()->json([
            'status' => true,
            'message' => 'User created.',
            'data' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $form = $request->all();
        
        $this->easyValidate($form, array_except(User::$rules, ['password']));
        
        $user = User::findOrFail($id);
        $user->update($form);

        return response()->json([
            'status' => true,
            'message' => 'User updated.',
            'data' => $user,
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User deleted.',
            'data' => $user,
        ]);
    }
}
