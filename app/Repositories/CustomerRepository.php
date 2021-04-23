<?php
namespace App\Repositories;
use App\Models\Customers;

class CustomerRepository extends BaseRepository{
    protected $customer;

    public function __construct(Customers $customer)
    {
        $this->customer = $customer;
    }

    public function all(){
        return $this->customer->all();
    }

    public function create($attributes){
        return $this->customer->create($attributes);
    }

    public function find($id)
    {
        return $this->customer->find($id);
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
        return $this->customer->delete($id);
    }

}
