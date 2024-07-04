<?php

namespace App\Interfaces\Service\Task;

interface TaskServiceInterface
{
    /**
     * @param array $payload
     * @param int|null $id
     * @return object
     */
    public function create(array $payload,int $id = null) :object;

    /**
     * @param int|null $created_by
     * @return object|null
     */
    public function all(int $created_by = null) : ?object;

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

    /**
     * @return array
     */
    public function taskStatusEnum() :array;

    /**
     * @param int $id
     * @param string $status
     * @return void
     */
    public function changeStatus(int $id,string $status) :void;

}
