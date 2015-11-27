<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\UserUpdateRequest;

use Input;
use Hash;
use Auth;

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

        if(Auth::user()->is_admin || Auth::validate(['email' => $user->email, 'password' => $request->old_password]))
        {
            $user->fill($request->except('password'));
            if ($new_password = $request->password) {
                $user->password = bcrypt($new_password);
            }

            $user->save();
            return redirect()->back()->with([
                'flash_message' => 'User profile has been updated successfully!'
            ]);
        }
        else {
            return redirect()->back()->withErrors(['old_password' => 'Current password is incorrect']);
        }
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
