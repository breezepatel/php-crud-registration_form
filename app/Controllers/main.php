<?php
namespace App\Controllers;
use App\Models\registermodel;

class main extends BaseController
{
    public function index() {
        $session = \Config\Services::session();
        $data['session'] = $session;

        $model = new registermodel();
        $registerArray = $model->getRecords();

        $data['registered'] = $registerArray;

        $session = \Config\Services::session();
        helper('form');
        
        return view('main/listall',$data);

    }

    public function create() {

        $session = \Config\Services::session();
        helper('form');

        $data = [];

        if ($this->request->getPost()){
            $input = $this->validate([
                'name' => 'required',
                'age' => 'required|less_than[100]|greater_than[0]',
                'gender' => 'required',
                'phonenumber' => 'required|exact_length[10]',
                'email' => 'required|valid_email',
            ]);

            if ($input == true) {
                // Form validated successfully, so we can save values to database
               $model = new registermodel();

                $model->save([
                    'name' => $this->request->getPost('name'),
                    'age' => $this->request->getPost('age'),
                    'gender' => $this->request->getPost('gender'),
                    'number' => $this->request->getPost('phonenumber'),
                    'email' => $this->request->getPost('email')
                ]);

               $session->setFlashdata('success','Record hass been successfully .');

                return redirect()->to('/main');
            } else {
                // Form not validated successfully

                $data['validation'] = $this->validator;
            }
        }

        return view('main/create',$data);
    }

    public function edit($id) {

        $session = \Config\Services::session();
        helper('form');

        $model = new registermodel();
        $register = $model->getRow($id);

        if (empty($register)) {
            $session->setFlashdata('error','Record not found.');
            return redirect()->to('/main');
        }

       $data['register'] = $register;

        if ($this->request->getPost()){
            $input = $this->validate([
                'name' => 'required',
                'age' => 'required|less_than[100]|greater_than[0]',
                'gender' => 'required',
                'phonenumber' => 'required|exact_length[10]',
                'email' => 'required|valid_email',
            ]);

            if ($input == true) {
                // Form validated successfully, so we can save values to database
               $model = new registermodel();

                $model->update($id,[
                    'name' => $this->request->getPost('name'),
                    'age' => $this->request->getPost('age'),
                    'gender' => $this->request->getPost('gender'),
                    'number' => $this->request->getPost('phonenumber'),
                    'email' => $this->request->getPost('email')
                ]);

               $session->setFlashdata('success','Record updated successfully .');

                return redirect()->to('/main');
            } else {
                // Form not validated successfully
                $data['validation'] = $this->validator;
            }
        }

        return view('main/edit',$data);
    }


    public function delete($id) {

        $session = \Config\Services::session();

        $model = new registermodel();
        $register = $model->getRow($id);

        if (empty($register)) {
            $session->setFlashdata('error','Record not found.');
            return redirect()->to('/main');
        }

        $model = new registermodel();
        $model->delete($id);

        $session->setFlashdata('success','You have successfully finished delete part.');
        return redirect()->to('/main');
    }

}
?>