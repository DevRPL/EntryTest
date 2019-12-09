<?php

namespace App\Http\Controllers;

use App\Entities\Role;
use App\Entities\User;
use Illuminate\Http\Request;
use App\Repositories\UsersRepository;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Support\Facades\Hash;

/**
 * Class usersController.
 */
class UsersController extends Controller
{
    /**
     * @var userRepository
     */
    protected $user;

    /**
     * usersController constructor.
     *
     * @param userRepository $repository
     */
    public function __construct(UserServiceContract $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();

        return view('user.index', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
                
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->user->create($data);

        if ($request->input('action') == 'save') {
            return redirect()->back();
        } else {
            return redirect()->route('users.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string                $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $data['password'] = Hash::make($data['password']);
        $this->user->update($data, $id);
        
        if ($request->input('action') == 'save') {
            return redirect()->back();
        } else {
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->find($id)->delete($id);
        
        return redirect()->back();
    }
}
