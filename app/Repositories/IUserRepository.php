<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class IUserRepository.
 */
interface IUserRepository
{
    public function find();

    public function findById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function delete($id);
}
