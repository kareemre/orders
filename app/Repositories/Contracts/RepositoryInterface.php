<?php

namespace App\Repositories\Contracts;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    
    /**
     * create new record 
     * 
     * @param \Illuminate\Http\Request|array $data
     * 
     * return \illuminate\Database\Eloquent\Model
     */
    public function create($data);


    /**
     * create new record 
     * 
     * @param \Illuminate\Http\Request|array $data
     * @param int $id
     * 
     * return \illuminate\Database\Eloquent\Model
     */
    public function update(int $id, $data);



    /**
     * Delete a specific record
     * 
     * @param  int id
     * @return bool
     */
    public function delete(int $id): bool;


    /**
     * List of records
     * 
     * @param  array options
     * @return \Illuminate\Support\Collection
     */
    public function list(array $option): Collection;
    
    /**
     * Get a specific record with full details
     * 
     * @param  int id
     * @return mixed
     */
    public function get(int $id);
}