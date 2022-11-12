<?php

namespace App\Http\Controllers;


use App\Models\UserSaving;
use App\Http\Requests\{StoreUserSavingRequest, UpdateUserSavingRequest};
use Yajra\DataTables\Facades\DataTables;

class UserSavingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view usersaving')->only('index', 'show');
        $this->middleware('permission:create usersaving')->only('create', 'store');
        $this->middleware('permission:edit usersaving')->only('edit', 'update');
        $this->middleware('permission:delete usersaving')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $userSavings = UserSaving::with('user:id,name', 'kop_product:id,name');

            return DataTables::of($userSavings)
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('kop_product', function ($row) {
                    return $row->kop_product ? $row->kop_product->name : '-';
                })->addColumn('action', 'user-savings.include.action')
                ->toJson();
        }


        return view('user-savings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-savings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserSavingRequest $request)
    {
        UserSaving::create($request->validated());

        return redirect()
            ->route('user-savings.index')
            ->with('success', __('UserSaving created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function show(UserSaving $userSaving)
    {
        $userSaving->load('user:id,name', 'kop_product:id,name');

		return view('user-savings.show', compact('usersaving'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSaving $userSaving)
    {
        $userSaving->load('user:id,name', 'kop_product:id,name');

		return view('user-savings.edit', compact('usersaving'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserSavingRequest $request, UserSaving $userSaving)
    {
        $userSaving->update($request->validated());

        return redirect()
            ->route('user-savings.index')
            ->with('success', __('UserSaving updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSaving $userSaving)
    {
        try {
            $userSaving->delete();

            return redirect()
                ->route('user-savings.index')
                ->with('success', __('UserSaving deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('user-savings.index')
                ->with('error', __('The UserSaving can`t be deleted because it is related to another table.'));
        }
    }
}
