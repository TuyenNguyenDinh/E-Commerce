<?php
namespace App\Repositories;
use App\Models\Products;


class ProductRepository extends BaseRepository{
    protected $product;

    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    public function all(){
        return $this->product->all();
    }

    public function create($attributes){
        return $this->product->create($attributes);
    }

    public function find($id)
    {
        return $this->product->find($id);
    }

    
    public function doUpload($attributes){
        return $this->product->doUpload($attributes);
    }

    // public function update(array $attributes = [])
    // {
    //     $udpate = $this->category->update($attributes);

    //     return $udpate;
    // }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
            $result = $this->find($id);
            if ($result) {
                $result->update($attributes);
                return $result;
            }

            return false;
    }

    public function destroy($id)
    {
        return $this->product->delete($id);
    }

}
