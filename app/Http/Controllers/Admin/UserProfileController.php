<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin;
class UserProfileController extends Controller
{
    public function profile()
    {
        return view('components.admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $userId = auth()->user()->id;
        $profile = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,email,'.$userId,
            'email' => 'required|email|unique:users,email,'.$userId,
        ]);

        $users = Admin::injectModel('User');
        $users->where(['id' => $userId])->update($profile);

        return redirect()->route('profile')->with('success','Profile has been update');

    }
}
