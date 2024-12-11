<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Repositories\BaseRepository;

class TeacherRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'first_name',
        'surname',
        'title',
        'email',
        'phone_number',
        'id_number',
        'tsc_number',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Teacher::class;
    }
}
