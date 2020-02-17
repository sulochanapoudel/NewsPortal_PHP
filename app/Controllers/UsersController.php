<?php


namespace App\Controllers;

use App\Models\User;
use System\Core\BaseController;

class UsersController extends BaseController
{
    public function __construct()
    {
        auth(url('login'));

        if(user()->type =='User') {
            set_message('Access Denied', 'danger');
            redirect(url('dashboard'));
        }
    }


    public function index()
    {
        $user = new User();
        $paginate = $user->where('type', 'User')->paginate(2);
        $users = $paginate['data'];
        view('cms/users/index.php',compact('users', 'paginate'));

    }

    public function  create()
    {
        view('cms/users/create.php');
    }

   public function store()
    {
        extract($_POST);

        $password = sha1($password);

        $user = new User;
        $user->first_name = $first_name;
        $user->middle_name = $middle_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->address = $address;
        $user->phone = $phone;
        $user->password = $password;
        $user->status = $status;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date ('Y-m-d H:i:s');
        $user->save();

        set_message('User added.','success');
        redirect(url('users'));
    }
    public function edit($id)
    {
        $user = new User($id);

        view('cms/users/edit.php', compact('user'));
    }
    public function update($id)
    {
        $user = new User($id);

        extract($_POST);

        $password = sha1($password);

        $user->first_name = $first_name;
        $user->middle_name = $middle_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->address = $address;
        $user->phone = $phone;
        $user->status = $status;
        $user->updated_at = date ('Y-m-d H:i:s');
        $user->save();

        set_message('User updated.','success');
        redirect(url('users'));
    }

    public function destroy($id)
    {
        $user = new User($id);
        $user->delete();

        set_message('User removed.','success');
        redirect(url('users'));
    }

}