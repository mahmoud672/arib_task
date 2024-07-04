<?php

namespace App\Services\Task;

use App\Interfaces\Service\Task\TaskServiceInterface;
use App\Models\Task;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class TaskService extends BaseService implements TaskServiceInterface
{
    /**
     * @var Task
     */
    protected $model;


    public function __construct(Task $model)
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
        $task = $this->model::find($id);
        if ($task)
        {
            $task->update($payload);
        }
        else
        {
            $task = $this->model::create($payload);
        }


        return $task->fresh();
    }

    /**
     * @param int|null $created_by
     * @return object|null
     */
    public function all(int $created_by = null): ?object
    {
        if($created_by)
            return $this->model::where('created_by',auth()->user()->id)->orderBy('created_at','DESC')->get();
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

    public function taskStatusEnum() :array
    {
        return[
          Task::$PENDING,
          Task::$STARTED,
          Task::$COMPLETED
        ];
    }

    public function changeStatus(int $id,string $status): void
    {
        $this->model::where('id',$id)->update(['status' => $status]);
    }

}
