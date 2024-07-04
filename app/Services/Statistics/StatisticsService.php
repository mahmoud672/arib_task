<?php

namespace App\Services\Statistics;

use App\Interfaces\Service\Statistics\StatisticsServiceInterface;
use App\Models\Department;
use App\Models\Task;
use App\Models\User;
use App\Services\BaseService;

class StatisticsService extends BaseService implements StatisticsServiceInterface
{

    /**
     * @var User
     */
    protected $user;
    /**
     * @var Task
     */
    protected $task;
    /**
     * @var Department
     */
    protected $department;
    public function __construct(User $user,Department $department,Task $task)
    {
        $this->user = $user;
        $this->department = $department;
        $this->task = $task;
    }
    public function employeesCount(): int
    {
        return $this->user::where('type',$this->user::$EMPLOYEE)->count();
    }

    public function adminsCount(): int
    {
        return $this->user::where('type',$this->user::$ADMIN)->count();
    }

    public function managersCount(): int
    {
        return $this->user::where('type',$this->user::$MANAGER)->count();
    }

    public function departmentsCount(): int
    {
        return $this->department::count();
    }

    public function tasksCount(): int
    {
        return $this->task::count();
    }

}
