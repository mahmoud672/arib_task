<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Task\ChangeTaskStatusRequest;
use App\Http\Requests\Dashboard\Task\StoreTaskRequest;
use App\Http\Requests\Dashboard\Task\UpdateTaskRequest;
use App\Interfaces\Service\Task\TaskServiceInterface;
use App\Interfaces\Service\User\UserServiceInterface;
use App\Models\User;


class TaskController extends Controller
{
    /**
     * @var TaskServiceInterface
     */
    protected $taskService;
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    public function __construct(TaskServiceInterface $taskService,UserServiceInterface $userService)
    {
        $this->taskService = $taskService;
        $this->userService = $userService;
    }

    public function index()
    {
        $tasks = $this->taskService->all();
        $allStatus = $this->taskService->taskStatusEnum();
        return view('dashboard.task.index',compact('tasks','allStatus'));
    }

    public function create()
    {
        $user = currentUser(auth()->user()->id);
        $employees = $this->userService->managerEmployees($user->id);
        $allStatus = $this->taskService->taskStatusEnum();
        return view('dashboard.task.create',compact('employees','allStatus'));
    }

    public function store(StoreTaskRequest $request)
    {
        $payload = $request->validated();
        $payload['created_by'] = auth()->user()->id;
        try {
            $this->taskService->create($payload);

            return redirect(adminUrl('task'))->with('success','task has been created successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }

    }

    public function edit($id)
    {
        $user = currentUser(auth()->user()->id);
        $task = $this->taskService->details($id);
//        $employees = User::where('manager_id',$user->id)->get();
        $employees = $this->userService->managerEmployees($user->id);
        $allStatus = $this->taskService->taskStatusEnum();
        $type = $user->type;
        return view('dashboard.task.edit',compact('task','employees','allStatus'));
    }

    public function update(UpdateTaskRequest $request,$id)
    {
        $payload = $request->validated();
        try {
            $this->taskService->create($payload,$id);
            return redirect(adminUrl('task'))->with('success','task has been updated successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }
    }

    public function changeStatus(ChangeTaskStatusRequest $request,$id)
    {
        try {
            $this->taskService->changeStatus($id,$request->status);
            return redirect(adminUrl('task'))->with('success','task has been updated successfully');
        }
        catch (\Exception $exception){
            throw $exception;
        }
    }

    public function destroy($id)
    {
        try {
            $this->taskService->delete($id);
            return redirect(adminUrl('task'))->with('success','task has been deleted successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }
    }
}
