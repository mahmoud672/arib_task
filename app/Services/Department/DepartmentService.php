<?php

namespace App\Services\Department;

use App\Interfaces\Service\Department\DepartmentServiceInterface;
use App\Models\Department;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class DepartmentService extends BaseService implements DepartmentServiceInterface
{
    /**
     * @var Department
     */
    protected $model;


    public function __construct(Department $model)
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
        $department = $this->model::find($id);
        if ($department)
        {
            $department->update($payload);
        }
        else
        {
            $department = $this->model::create($payload);
        }


        return $department->fresh();
    }

    /**
     * @param string $type
     * @return object|null
     */
    public function all(): ?object
    {
        return $this->model::orderBy('created_at','DESC')->get();
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

}
