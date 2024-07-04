<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Service\Statistics\StatisticsServiceInterface;

class DashboardController extends Controller
{
    /**
     * @var StatisticsServiceInterface
     */
    protected $statisticsService;
    public function __construct(StatisticsServiceInterface $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function index()
    {
        $tasks = $this->statisticsService->tasksCount();
        $employees = $this->statisticsService->employeesCount();
        $managers = $this->statisticsService->managersCount();
        $departments = $this->statisticsService->departmentsCount();
        return view('dashboard.welcome', compact('tasks', 'employees', 'managers', 'departments'));
    }
}
