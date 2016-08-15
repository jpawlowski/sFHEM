<?php

namespace App\Repositories;

use App\Models\Backend;
use InfyOm\Generator\Common\BaseRepository;

class BackendRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uri',
        'name',
        'upstream'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Backend::class;
    }
}
