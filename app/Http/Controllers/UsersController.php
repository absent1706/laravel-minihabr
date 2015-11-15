<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\UserUpdateRequest;

use Input;
use Hash;

class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->except(['email', 'password']));

        return redirect()->back()->with([
            'flash_message' => 'User profile has been updated successfully!',
            'flash_class'   => 'success'
        ]);
    }

    public function updatePassword(Requests\UserUpdatePasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(Hash::check(Input::get('old_password'), $user->getAuthPassword())) {
            $user->update(['password' => Hash::make(Input::get('password'))]);
        } else {
            return redirect()->back()->withErrors(['old_password' => 'Current password is incorrect']);
        }

        return redirect()->back()->with([
            'flash_message' => 'User password has been updated successfully!',
            'flash_class'   => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
