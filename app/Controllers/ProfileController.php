<?php


namespace App\Controllers;


use System\Core\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        // TODO: Implement index() method.
    }
    public function edit()
    {
        $user = user();
        view('cms/profile/edit.php', compact('user'));
    }

    public function update()
    {
        extract($_POST);
        $user = user();

        $user->first_name = $first_name;
        $user->middle_name = $middle_name;
        $user->last_name = $last_name;
        $user->phone = $phone;
        $user->address = $address;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        set_message('Profile Updated.','success');
        redirect(url('profile/edit'));

    }

    public function password()
    {

    }
}

