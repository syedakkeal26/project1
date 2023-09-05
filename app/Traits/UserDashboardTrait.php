<?php

namespace App\Traits;

use App\Models\Useradmin;
use Illuminate\Http\Request;

trait UserDashboardTrait
{
    // Add methods and properties related to the user dashboard here

    public function getUserProfile($userId)
    {
        $user = Useradmin::find($userId);
        if (!$user) {
            return null;
        }
        $userProfile = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        return $userProfile;
    }

    public function updateUserProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:useradmins,email,' . $id,
        ]);

        $user = Useradmin::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return true;
    }

}
