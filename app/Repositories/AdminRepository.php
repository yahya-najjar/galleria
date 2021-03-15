<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRepository {

    public function add(Request $request)
    {
        $admin = new Admin($request->all());

        if ($request->has('password'))
            $admin->password = bcrypt($request->get('password'));

        if ($request->hasFile('avatar'))
            $admin->avatar = Storage::disk('public')->put('admins', $request->file('avatar'));

        $admin->syncRoles($request->get('role'));

        $admin->save();
    }

    public function update(Request $request, Admin $admin)
    {
        if ($request->has('password'))
            $admin->password = bcrypt($request->get('password'));

        foreach ($admin->roles()->get() as $role)
            $admin->removeRole($role);

        $admin->syncRoles($request->get('role'));

        $admin->update($request->except(['password']));

        if ($request->hasFile('avatar')){
            // if there is an old avatar delete it
            if ($admin->avatar != null){
                $admin->avatar = Storage::disk('public')->delete($admin->avatar);
            }

            // store the new image
            $admin->avatar = Storage::disk('public')->put('admins', $request->file('avatar'));
        }

        $admin->save();


    }

    public function delete(Admin $admin)
    {
        if ($admin->image != null)
            $admin->image = Storage::disk('public')->delete($admin->image);

        $admin->delete();
    }

    public function getAdmins()
    {
        return Admin::orderBy('created_at')->get();
    }

}
