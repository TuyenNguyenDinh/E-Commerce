<?php

namespace App\Repositories;

use Guzzle\Http\Message\Request;

abstract class EloquentRepository
{
    
  
    protected $_model;

  
    public function __construct()
    {
        $this->setModel();
    }

  
    abstract public function getClassModel();

   
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getClassModel()
        );
    }


    public function getAll()
    {

        return $this->_model->all();
    }

    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }

  
    public function create(array $attributes)
    {

        return $this->_model->create($attributes);
    }

   
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }


    public function doUpload($attributes){
        $fileName = "";
        //Kiểm tra file
        if (($attributes)->isValid()) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $attributes->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $attributes->move($uploadPath, $fileName);
        } else {
        }

        return $fileName;
    }

   
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }

}
