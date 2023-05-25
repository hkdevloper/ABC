<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Function to view All Users
    public function viewUsers()
    {
        return view('pages.admin.users.view_all_users');
    }

    // Function to view Add User
    public function viewAddUser()
    {
        return view('pages.admin.users.add_user');
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

}
