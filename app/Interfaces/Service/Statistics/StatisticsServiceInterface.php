<?php

namespace App\Interfaces\Service\Statistics;

interface StatisticsServiceInterface
{

    /**
     * @return int
     */
    public function employeesCount() : int;

    /**
     * @return int
     */
    public function managersCount() : int;

    /**
     * @return int
     */
    public function adminsCount() : int;

    /**
     * @return int
     */
    public function departmentsCount() : int;

    /**
     * @return int
     */
    public function tasksCount() : int;

}
