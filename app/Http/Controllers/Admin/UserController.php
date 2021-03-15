<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private $userRepository;
    public $resource = 'user';

    public function __construct(UserRepository $userRepository)
    {
//        appendGeneralPermissions($this);
        $this->userRepository = $userRepository;
        view()->share('item', $this->resource);
        view()->share('class', User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = $this->userRepository->getUsers();
        return view('admin.crud.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.crud.edit-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->userRepository->add($request);

        $request->session()->flash('success', 'user created successfully');

        if ($request->has('add-new'))
            return redirect()->route('admin.users.create');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('admin.crud.edit-new', compact('user',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $this->userRepository->update($request, $user);

        $request->session()->flash('success', 'user updated successfully');

        if ($request->has('add-new'))
            return redirect()->back();

        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        $this->userRepository->delete($user);
        $request->session()->flash('success', 'user deleted successfully');
        return redirect()->route('admin.users.index');
    }

    public function usersAutoComplete(Request $request): JsonResponse
    {
        $search = $request->get('search');
        $models = $this->userRepository->usersAutoComplete($search);

        return response()->json([
            'results' => $models
        ]);
    }

}
