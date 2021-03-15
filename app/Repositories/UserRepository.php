<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserRepository {

    public function add(Request $request): User
    {
        $user = new User($request->all());

        $user->is_designer = $request->input('is_designer') == 'on' ? 1 : 0;

        if(!$request->has('email'))
            $user->email = 'user'.generateRandomString(4).'@galleria.com';

        if ($request->has('password'))
            $user->password = bcrypt($request->password);

        if ($request->hasFile('avatar'))
            $user->avatar = Storage::disk('public')->put('users', $request->file('avatar'));

        $user->save();

        return $user;
    }

    public function update(Request $request, User $user)
    {
        if ($request->has('password'))
            $user->password = bcrypt($request->password);

        $user->update($request->except(['password']));

        $user->is_designer = $request->input('is_designer') == 'on' ? 1 : 0;
        $user->subscribe = $request->input('subscribe') == 'on' ? 1 : 0;

        if ($request->hasFile('avatar')){
            // if there is an old avatar delete it
            if ($user->avatar != null){
                $user->avatar = Storage::disk('public')->delete($user->avatar);
            }

            // store the new image
            $user->avatar = Storage::disk('public')->put('users', $request->file('avatar'));
        }

        $user->save();
    }

    public function delete(User $user)
    {
        if ($user->avatar != null)
            $user->avatar = Storage::disk('public')->delete($user->avatar);

        $user->delete();
    }

    public function getUsers()
    {
        return User::orderBy('created_at')->paginate(10);
    }

    public function usersAutoComplete($search)
    {
        return User::where('name', 'LIKE', "%{$search}%")
            ->take(5)
            ->get()->map(function ($result){
                return array(
                    'id' => $result->id,
                    'text' => $result->name,
                );
            });
    }

}
