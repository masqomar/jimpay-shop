<?php

namespace App\Http\Controllers;


use App\Models\UserTopup;
use App\Http\Requests\{StoreUserTopupRequest, UpdateUserTopupRequest};
use Yajra\DataTables\Facades\DataTables;

class UserTopupController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view usertopup')->only('index', 'show');
        $this->middleware('permission:create usertopup')->only('create', 'store');
        $this->middleware('permission:edit usertopup')->only('edit', 'update');
        $this->middleware('permission:delete usertopup')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $userTopups = UserTopup::with('user:id,name');

            return DataTables::of($userTopups)
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('action', 'user-topups.include.action')
                ->toJson();
        }


        return view('user-topups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-topups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTopupRequest $request)
    {
        UserTopup::create($request->validated());

        return redirect()
            ->route('user-topups.index')
            ->with('success', __('UserTopup created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function show(UserTopup $userTopup)
    {
        $userTopup->load('user:id,name');

		return view('user-topups.show', compact('usertopup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTopup $userTopup)
    {
        $userTopup->load('user:id,name');

		return view('user-topups.edit', compact('usertopup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTopupRequest $request, UserTopup $userTopup)
    {
        $userTopup->update($request->validated());

        return redirect()
            ->route('user-topups.index')
            ->with('success', __('UserTopup updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTopup $userTopup)
    {
        try {
            $userTopup->delete();

            return redirect()
                ->route('user-topups.index')
                ->with('success', __('UserTopup deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('user-topups.index')
                ->with('error', __('The UserTopup can`t be deleted because it is related to another table.'));
        }
    }
}
