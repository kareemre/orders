<?php

namespace App\Repositories\Managers;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class RepositoryManager implements RepositoryInterface
{

    /**
     * Model name
     * 
     * @const string
     */
    const MODEL = '';


    /**
     * Table name
     *
     * @const string
     */
    const TABLE = '';



    public function __construct()
    {
        
    }


    /**
     * @{inheritDoc}
     */
    public function create($data): Model
    {
        return static::MODEL::create($data);
    }


     /**
     * @{inheritDoc}
     */
    public function update(int $id, $data): Model
    {
        $record = $this->get($id);
        $record->update($data);
        return $record;
    }   

     /**
     * @{inheritDoc}
     */
    public function delete(int $id): bool
    {
        $record = $this->get($id);
        return $record->delete();
    }


     /**
     * @{inheritDoc}
     */
    public function list(array $options): Collection
    {
        $query = static::MODEL::query();

        $results = $this->buildQuery($query, $options);

        return $results->get();

        //this is to be improved to implement filteration, orderby, groupby, pagination and other query builder methods
    }

    /**
     * @{inheritDoc}
     */
    public function get(int $id)
    {
        return static::MODEL::find($id);
    }

    /**
     * Summary of buildQuery
     * @param mixed $query
     * @param array $options
     * @return \illuminate\Database\Eloquent\Model
     */
    private function buildQuery($query, array $options)
    {
        if (!empty($options['select'])) {
            $query->select($options['select']);

        } else {
            $query->select('*');
        }

        return $query;

        //this is to be improved to implement filteration, orderby, groupby, pagination and other query builder methods

    }
}

