<?php
namespace App\Repositories;
use App\Models\Orders;

class OrderRepository extends BaseRepository{
    protected $order;

    public function __construct(Orders $order)
    {
        $this->order = $order;
    }

    public function all(){
        return $this->order->all();
    }

    public function create($attributes){
        return $this->order->create($attributes);
    }

    public function find($id)
    {
        return $this->order->find($id);
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
        return $this->order->delete($id);
    }

}
