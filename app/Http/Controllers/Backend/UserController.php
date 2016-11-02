<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Accounts\User;
use App\Accounts\Permission\Permission;
use App\Accounts\Permission\Role;
use App\Http\Helpers\Alertable;

class UserController extends Controller
{
    use Alertable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);

        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show', compact('user'));
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
        $user = User::find($id);
        $permissions = Permission::all();
        $roles = Role::all();

        return view('backend.user.edit', compact('user', 'permissions', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        $this->alert('Success', '成功更新使用者資訊!')->success()->flashIt();

        return redirect()->route('backend.user.index');
    }

    public function updateRoles(Request $request, $id)
    {
        $user = User::find($id);
        $role_ids = ($request->get('role')) ? array_values($request->get('role')) : [];
        $user->syncRoles($role_ids);
        $this->alert('Success', '成功更新使用者角色!')->success()->flashIt();

        return redirect()->route('backend.user.edit', $id);
    }

    public function detachRoot(Request $request, $id)
    {
        $user = User::find($id);
        $user->detachRole(Role::findName('superRoot'));
        $this->alert('Success', '成功更新使用者角色!')->success()->flashIt();

        return redirect()->route('backend.user.edit', $id);
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
        $user = User::find($id);
        $user->delete();

        return redirect()->route('backend.user.index');
    }
}
