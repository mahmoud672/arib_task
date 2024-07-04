<?php

namespace App\Interfaces\Service\Department;

interface DepartmentServiceInterface
{
    /**
     * @param array $payload
     * @param int|null $id
     * @return object
     */
    public function create(array $payload,int $id = null) :object;

    /**
     * @return object|null
     */
    public function all() : ?object;

    /**
     * @param int $id
     * @return object|null
     */
    public function details(int $id) :?object;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) :bool;
}
