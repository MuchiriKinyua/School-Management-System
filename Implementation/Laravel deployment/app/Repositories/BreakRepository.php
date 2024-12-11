<?php

namespace App\Repositories;

use App\Models\Breaks;  // Update this line
use App\Repositories\BaseRepository;

class BreakRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'duration_minutes',
        'start_time',
        'end_time'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Breaks::class;  // Update this line
    }
}
