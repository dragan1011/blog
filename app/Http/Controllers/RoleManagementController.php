<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleManagementController extends Controller
{
    public function __construct()
    {
        // Ensure only superadmins have access to the role management features
        $this->middleware('role:superadmin');
    }

    public function index()
    {
        // Fetch all users and pass to the view
        $users = User::all();
        return view('role-management.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('role-management.edit', compact('user'));
    }

    public function updateRole(Request $request, User $user)
    {
        // Validate the incoming role field
        $request->validate([
            'role' => 'requred|in:iadmin,superadmin',
        ]);

        // Prevent a user from changing their own role
        if ($user->id === Auth::id()) {
            return redirect()->route('role-management.index')
                ->with('error', 'You cannot update your own role!');
        }

        try {
            // Update the user's role and save
            $user->role = $request->role;
            $user->save();

            return redirect()->route('role-management.index')
                ->with('success', 'Role updated successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the update
            return redirect()->route('role-management.index')
                ->with('error', 'Failed to update the role.');
        }
    }
}
