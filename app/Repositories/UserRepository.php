<?php
namespace App\Repositories;
use App\Models\User;

class UserRepository extends BaseRepository{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all(){
        return $this->user->all();
    }

    public function create($attributes){
        return $this->user->create($attributes);
    }

    public function find($id)
    {
        return $this->user->find($id);
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
        return $this->user->delete($id);
    }

}
