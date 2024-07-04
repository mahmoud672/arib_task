<?php

namespace App\Services\User;

use App\Enums\UserType;
use App\Interfaces\Service\User\UserServiceInterface;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService implements UserServiceInterface
{
    /**
     * @var User
     */
    protected $model;


    public function __construct(User $model)
    {
        $this->model = $model;
    }
    /**
     * @param array $payload
     * @param int|null $id
     * @return object
     */
    public function create(array $payload, int $id = null): object
    {
        if(array_key_exists('password',$payload))
            $payload['password'] = Hash::make($payload['password']);

        $user = $this->model::find($id);
        if ($user)
        {
            $user->update($payload);
        }
        else
        {
            $user = $this->model::create($payload);
        }

        if (array_key_exists("image",$payload))
            $user->update(['image_path' => $this->uploadFile($payload['image'],"users/$user->type/$user->id")]);

        return $user->fresh();
    }

    /**
     * @param string $type
     * @return object|null
     */
    public function all(string $type = 'employee'): ?object
    {
        return $this->model::where('type',$type)->orderBy('created_at','DESC')->get();
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function details(int $id): ?object
    {
        return $this->model::find($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model::where('id',$id)->delete();
    }

    /**
     * @param int|null $manager_id
     * @return object|null
     */
    public function managerEmployees(int $manager_id = null): ?object
    {
        if(auth()->user()->type == UserType::$ADMIN)
            return $this->model::orderBy('created_at','DESC')->get();
        return $this->model::where('manager_id',$manager_id ?? auth()->user()->id)->orderBy('created_at','DESC')->get();
    }

}
