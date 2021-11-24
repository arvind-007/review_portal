<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public $usermodel;
    public $profilemodel;
    public function __construct()
    {
        $this->usermodel = model('usermodel');
        $this->profilemodel = model('userprofilemodel');
        helper('common');
    }

    public function index()
    {
        echo view('dashboard/header/header_top');
        echo view('dashboard/sidebar/sidebar');
        echo view('dashboard/content/profile');
        echo view('dashboard/footer/footer.php');
    }

    public function articles()
    {
        echo view('dashboard/header/header_top');
        echo view('dashboard/sidebar/sidebar');
        echo view('dashboard/content/articles');
        echo view('dashboard/footer/footer.php');
    }
    public function showProfile()
    {
        $model = $this->usermodel;
        // $id = $_SESSION['user_details']['uid'];
        $id = 6;
        $user = $model->getFieldsForJoin('u.mobile,u.email,up.first_name,up.last_name,up.dob,up.gender,up.address,up.profile_photo', 'users_profile up', 'u.id=up.user_id', "u.id=$id", 'left');
        echo json_encode([
            "status" => 1,
            "msg" => "successful",
            "user_details" => $user,
        ]);
    }

    public function updateProfile()
    {

        $model = $this->usermodel;
        $pmodel = $this->profilemodel;
        // $id = $_SESSION['user_details']['uid'];
        $id = 6;
        $img_name = $pmodel->getFields('up.profile_photo', "user_id='$id'")[0];
        if (isset($_FILES['profile']) && $_FILES['profile']['name']) {
            $photo = $_FILES['profile'];
            $img = explode('.', $photo['name']);
            $name = $img[0];
            $ext = end($img);
            $tmp_name = $photo['tmp_name'];
            $size = $photo['size'];
            $type = $photo['type'];
            $img_name = md5($name . time()) . "." . $ext;
            move_uploaded_file($tmp_name, "uploaded_img/" . $img_name);
        }
        $data = [
            'mobile' => $_POST['mobile'],
            'email' => $_POST['email'],
            'updated_at' => date("d/m/Y"),
        ];
        $model->updateRow($data, "id=$id");
        $data = [
            'first_name' => $_POST['fname'],
            'last_name' => $_POST['lname'],
            'dob' => $_POST['dob'],
            'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
            'address' => $_POST['address'],
            'profile_photo' => $img_name,
            'updated_at' => date("d/m/Y"),
        ];
        $pmodel->updateRow($data, "user_id=$id");
        $_SESSION['user_details'] = [
            "uid" => $id,
            "fname" => $_POST['fname'],
            "lname" => $_POST['lname'],
        ];
        echo json_encode([
            "status" => 1,
        ]);
    }

    public function changePass()
    {
        // $id = $_SESSION['user_details']['uid'];
        $model = $this->usermodel;
        $id = 6;
        $password = md5($_POST['password']);
        $exist = $model->get("password = '$password' AND id='$id'");
        if ($exist) {
            $new_pass = md5($_POST['new_password']);
            $data = [
                'password' => $new_pass,
            ];
            $model->updateRow($data, "id='$id'");
            echo json_encode([
                "status" => 1,
                "msg" => "Successful",
            ]);
        } else {
            echo json_encode([
                "status" => 0,
                "msg" => "Please enter correct password",
            ]);
        }
    }

}