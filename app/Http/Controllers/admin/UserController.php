<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Function to view All Users
    public function viewUsers()
    {
        // Get All users with innner join in user_groups table to get user group name
        $users = User::with('userGroup')->get();
        return view('pages.admin.users.view_all_users')->with('users', $users);
    }

    // Function to view Add User
    public function viewAddUser()
    {
        // Get All user groups
        $groups = UserGroup::all();
        return view('pages.admin.users.add_user')->with('groups', $groups);
    }

    // Function to insert new user
    public function doAddUser(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'group_id' => 'required'
        ]);

        // check if user group exists
        $group = UserGroup::find($request->group_id);
        if (!$group) {
            return redirect()->back()->with('error', 'User group not found');
        }


        // Insert the data into database
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->password   = bcrypt($request->password);
        $user->user_group_id = $request->group_id;
        $user->balance = $request->account_balance;
        $user->approved   = $request->approved ? 1 : 0;
        $user->email_verified = $request->email_verified ? 1 : 0;
        if($request->email_verified){
            $user->email_verified_at = now();
        }
        $user->taxable = $request->taxable ? 1 : 0;
        $user->banned = $request->banned ? 1 : 0;
        $user->save();

        // Redirect to users page with success message
        return redirect()->route('users')->with('success', 'User added successfully');
    }

    // Function to view Edit User
    public function viewEditUser($id)
    {
        // Get the user by id
        $user = User::find($id);

        // If the user is not found then redirect to users page with error message
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found');
        }

        // Get All user groups
        $groups = UserGroup::all();
        $data = compact('user', 'groups');
        return view('pages.admin.users.edit_user')->with($data);
    }

    // Function to view user groups
    public function viewUserGroups()
    {
        // Get All user groups
        $groups = UserGroup::all();
        return view('pages.admin.users.view_all_groups')->with('groups', $groups);
    }

    // Function to view Add User Group
    public function viewAddUserGroup()
    {
        return view('pages.admin.users.add_group');
    }

    // Function to insert new user group
    public function doAddUserGroup(Request $request)
    {
        // Validate the request
        $request->validate([
            'group_name' => 'required|unique:user_group,name',
            'roles' => 'required|array'
        ]);
        $requestData = $request->roles;
        $jsonData = [
            "user_login" => false,
            "admin_email" => false,
            "admin_files" => false,
            "admin_login" => false,
            "admin_users" => false,
            "admin_claims" => false,
            "admin_export" => false,
            "admin_fields" => false,
            "admin_import" => false,
            "admin_content" => false,
            "admin_reviews" => false,
            "admin_listings" => false,
            "admin_messages" => false,
            "admin_products" => false,
            "admin_settings" => false,
            "admin_locations" => false,
            "admin_appearance" => false,
            "admin_categories" => false
        ];

        foreach ($requestData as $key) {
            if (array_key_exists($key, $jsonData)) {
                $jsonData[$key] = true;
            }
        }

        // Insert the data into database
        $group = new UserGroup();
        $group->name = $request->group_name;
        $group->permissions = $jsonData;
        $group->save();

        // Redirect to view all user groups
        return redirect()->route('user.groups')->with('success', 'User group added successfully');
    }

    // Function to delete user group
    public function doDeleteUserGroup($id)
    {
        // if the id is 1 and 2 then don't delete
        if ($id == 1 || $id == 2) {
            return redirect()->route('user.groups')->with('error', 'You can not delete this user group');
        }
        // Find the user group
        $group = UserGroup::find($id);

        // Delete the user group
        $group->delete();

        // Redirect to view all user groups
        return redirect()->route('user.groups')->with('success', 'User group deleted successfully');
    }

    // Function to view Edit User Group
    public function viewEditUserGroup($id)
    {
        // Find the user group
        $group = UserGroup::find($id);

        // If the user group is not found then redirect to view all user groups
        if (!$group) {
            return redirect()->route('user.groups')->with('error', 'User group not found');
        }
        $id = $group->id;
        $name = $group->name;
        // convert permissions to string
        $permissions = json_encode($group->permissions);
        $data = compact('id','name', 'permissions');

        // Return the view
        return view('pages.admin.users.edit_group')->with($data);
    }

    // Function to update user group
    public function doEditUserGroup(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'id' => 'required',
            'group_name' => 'required|unique:user_group,name,'.$request->id,
            'roles' => 'required|array'
        ]);
        $requestData = $request->roles;
        $jsonData = [
            "user_login" => false,
            "admin_email" => false,
            "admin_files" => false,
            "admin_login" => false,
            "admin_users" => false,
            "admin_claims" => false,
            "admin_export" => false,
            "admin_fields" => false,
            "admin_import" => false,
            "admin_content" => false,
            "admin_reviews" => false,
            "admin_listings" => false,
            "admin_messages" => false,
            "admin_products" => false,
            "admin_settings" => false,
            "admin_locations" => false,
            "admin_appearance" => false,
            "admin_categories" => false
        ];

        foreach ($requestData as $key) {
            if (array_key_exists($key, $jsonData)) {
                $jsonData[$key] = true;
            }
        }

        // Find the user group
        $group = UserGroup::find($request->id);

        // Handle Exception if the user group is not found
        if (!$group) {
            return redirect()->route('user.groups')->with('error', 'User group not found');
        }

        // Update the user group
        $group->name = $request->group_name;
        $group->permissions = $jsonData;
        $group->save();

        // Redirect to view all user groups
        return redirect()->route('user.groups')->with('success', 'User group updated successfully');
    }

    // Function to delete user
    public function doDeleteUser($id)
    {
        // if the id is 1 and 2 then don't delete
        if ($id == 1 || $id == 2) {
            return redirect()->route('users')->with('error', 'You can not delete this user');
        }
        // Find the user
        $user = User::find($id);

        // If the user is not found then redirect to view all users
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found');
        }

        // Delete the user
        $user->delete();

        // Redirect to view all users
        return redirect()->route('users')->with('success', 'User deleted successfully');
    }

}
