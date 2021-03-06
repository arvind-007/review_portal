<?php

namespace App\Controllers;

use App\Libraries\PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Users extends BaseController
{
    public $usermodel;
    public $profilemodel;
    public $session;
    public $pager;
    public $perPage;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        if (!$this->session->get("is_login")) {
            header("Location:" . base_url());
            exit;
        }
        $this->usermodel = model('UserModel');
        $this->profilemodel = model('UserProfileModel');
        $this->pager = \Config\Services::pager();
        $this->perPage = 10;
        helper('common');
    }

    public function index()
    {
        $pager = $this->pager;
        $page = $this->request->getGet('page') > 2 ? $this->request->getGet('page') : 1;
        $perPage = $this->perPage;
        $total = $this->usermodel->getCount();
        $pager->makeLinks($page, $perPage, $total);
        $data = [
            "session" => $this->session,
            "pager" => $this->pager,
            'page_number' => $this->request->getGet('page'),
        ];

        return view('dashboard/content/users/users', $data);
    }

    public function showUsers()
    {
        $perPage = $this->perPage;
        $offset = ($this->request->getGet('page') < 2) ? '1' : (($this->request->getGet('page') - 1) * $perPage) + 1;
        $users = $this->usermodel->getPaginate($perPage, $offset - 1);
        echo json_encode([
            "status" => 1,
            'msg' => "Users details fetch successfully!",
            "users" => $users,
        ]);
    }

    public function suspendUser()
    {
        $umodel = $this->usermodel;
        $id = $this->request->getPost('id');
        $data = [
            'status' => 2,
        ];
        $umodel->updateRow($data, "id = '$id'");
        echo json_encode([
            "status" => 1,
            "msg" => "User suspend succesfully!",
        ]);
    }

    public function deleteUser()
    {
        $umodel = $this->usermodel;
        $upmodel = $this->profilemodel;
        $id = $this->request->getPost('id');
        $umodel->deleteRow($id);
        $upmodel->deleteRow($id);
        echo json_encode([
            "status" => 1,
            "msg" => "User deleted succesfully!",
        ]);
    }

    public function exportToPDF()
    {
        $usermodel = $this->usermodel;
        $pdf = new PDF();
        $header = array('S.No.', 'Name', 'Email', 'Mobile');
        $data = $usermodel->getFieldsForJoin('first_name, last_name, email,mobile', 'users_profile up', 'up.user_id=users.id');
        // prd($data);
        $pdf->SetFont('Arial', '', 14);
        $pdf->AddPage();
        $pdf->FancyTable($header, $data);
        $this->response->setContentType("application/pdf");
        $pdf->Output("users.pdf", "D");
    }

    public function exportToExcel()
    {
        $usermodel = $this->usermodel;
        $users = $usermodel->getFieldsForJoin('first_name, last_name, email,mobile', 'users_profile up', 'up.user_id=users.id');

        $fileName = 'users.xlsx';
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'first_name');
        $sheet->setCellValue('B1', 'last_name');
        $sheet->setCellValue('C1', 'email');
        $sheet->setCellValue('D1', 'mobile');
        $rows = 2;

        foreach ($users as $val) {
            $sheet->setCellValue('A' . $rows, $val['first_name']);
            $sheet->setCellValue('B' . $rows, $val['last_name']);
            $sheet->setCellValue('C' . $rows, $val['email']);
            $sheet->setCellValue('D' . $rows, $val['mobile']);
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save("uploads/excel/" . $fileName);
        header("Content-Type: application/vnd.ms-excel");
        return redirect()->to(base_url() . "/uploads/excel/" . $fileName);
    }

}