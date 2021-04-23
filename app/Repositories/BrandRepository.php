<?php
namespace App\Repositories;
use App\Models\Brands;

class BrandRepository extends BaseRepository{
    protected $brand;

    public function __construct(Brands $brand)
    {
        $this->brand = $brand;
    }

    public function all(){
        return $this->brand->all();
    }

    public function create($attributes){
        return $this->brand->create($attributes);
    }

    public function find($id)
    {
        return $this->brand->find($id);
    }

    // public function update(array $attributes = [])
    // {
    //     $udpate = $this->brand->update($attributes);

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
        return $this->brand->delete($id);
    }

}
