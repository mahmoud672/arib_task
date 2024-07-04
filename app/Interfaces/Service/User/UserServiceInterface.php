<?php

namespace App\Interfaces\Service\User;

interface UserServiceInterface
{
    /**
     * @param array $payload
     * @param int|null $id
     * @return object
     */
    public function create(array $payload,int $id = null) :object;

    /**
     * @param string $type
     * @return object|null
     */
    public function all(string $type = 'employee') : ?object;

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
     * @param int|null $manager_id
     * @return object|null
     */
    public function managerEmployees(int $manager_id = null) :? object;
}
