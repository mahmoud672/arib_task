<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Employee\StoreEmployeeRequest;
use App\Http\Requests\Dashboard\Employee\UpdateEmployeeRequest;
use App\Interfaces\Service\Department\DepartmentServiceInterface;
use App\Interfaces\Service\User\UserServiceInterface;
use App\Models\Department;

class EmployeeController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    protected $departmentService;

    public function __construct(UserServiceInterface $userService,DepartmentServiceInterface $departmentService)
    {
        $this->userService = $userService;
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $employees = $this->userService->managerEmployees();
        return view('dashboard.employee.index',compact('employees'));
    }

    public function create()
    {
        $departments = $this->departmentService->all();
        $types = [UserType::$MANAGER,UserType::$EMPLOYEE];

        return view('dashboard.employee.create',compact('departments','types'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $payload = $request->validated();
        $user = auth()->user();
        $payload['manager_id'] =  $user->type == UserType::$MANAGER ? $user->id : null;
        try {
            $this->userService->create($payload);

            return redirect(adminUrl('employee'))->with('success','employee has been created successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }

    }

    public function edit($id)
    {
        $employee = $this->userService->details($id);
        $departments = $this->departmentService->all();
        return view('dashboard.employee.edit',compact('employee','departments'));
    }

    public function update(UpdateEmployeeRequest $request,$id)
    {
        $payload = $request->validated();
        $payload['manager_id'] =  auth()->user()->id;
        try {
            $this->userService->create($payload,$id);
            return redirect(adminUrl('employee'))->with('success','employee has been updated successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }
    }

    public function destroy($id)
    {
        try {
            $this->userService->delete($id);
            return redirect(adminUrl('employee'))->with('success','employee has been deleted successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }
    }
}
