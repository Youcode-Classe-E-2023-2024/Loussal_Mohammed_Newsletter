<?php

namespace App\Http\Controllers\users;

use App\Models\User;
class users
{
    public function listUsers(User $user) {
        $users = $user->withTrashed()->get();
        return view('newsletter.subscribers', compact('users'));
    }

    public function dropUser(User $user) {
        $user->delete();
        redirect('/list')->with('success', 'user deleted successfully!');
    }
    public function restoreUser($id) {
        $user = User::withTrashed()->find($id);
        if($user) {
            $user->restore();
            redirect('/list')->with('success', 'user restored successfully!');
        }

    }
}
