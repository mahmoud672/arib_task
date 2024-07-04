<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Department\StoreDepartmentRequest;
use App\Http\Requests\Dashboard\Department\UpdateDepartmentRequest;
use App\Interfaces\Service\Department\DepartmentServiceInterface;


class DepartmentController extends Controller
{
    /**
     * @var DepartmentServiceInterface
     */
    protected $departmentService;

    public function __construct(DepartmentServiceInterface $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = $this->departmentService->all();
        return view('dashboard.department.index',compact('departments'));
    }

    public function create()
    {
        return view('dashboard.department.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $payload = $request->validated();
        try {
            $this->departmentService->create($payload);

            return redirect(adminUrl('department'))->with('success','department has been created successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }

    }

    public function edit($id)
    {
        $department = $this->departmentService->details($id);
        return view('dashboard.department.edit',compact('department'));
    }

    public function update(UpdateDepartmentRequest $request,$id)
    {
        $payload = $request->validated();
        try {
            $this->departmentService->create($payload,$id);
            return redirect(adminUrl('department'))->with('success','department has been updated successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }
    }

    public function destroy($id)
    {
        try {
            $this->departmentService->delete($id);
            return redirect(adminUrl('department'))->with('success','department has been deleted successfully');
        }
        catch (\Exception $exception){
            return back()->with('exception','error occurred');
        }
    }
}
