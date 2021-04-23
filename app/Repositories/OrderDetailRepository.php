<?php
namespace App\Repositories;
use App\Models\Orderdetails;

class OrderDetailRepository extends BaseRepository{
    protected $orderdetail;

    public function __construct(Orderdetails $orderdetail)
    {
        $this->orderdetail = $orderdetail;
    }

    public function all(){
        return $this->orderdetail->all();
    }

    public function create($attributes){
        return $this->orderdetail->create($attributes);
    }

    public function find($id)
    {
        return $this->orderdetail->find($id);
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
        return $this->orderdetail->delete($id);
    }

}
