<?php
namespace App\Models;

use CodeIgniter\Model;

class registermodel extends Model{

    protected $table = 'task1';
    protected $allowedFields = ['name','age','gender','number','email'];


    public function getRecords() {
        return $this->orderBy('id','DESC')->findAll();
    }

    public function getRow($id) {
        // SELECT * FROM list where id = $id
        return $this->where('id',$id)->first();
    }
}
?>