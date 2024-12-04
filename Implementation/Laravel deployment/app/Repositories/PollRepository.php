<?php

namespace App\Repositories;

use App\Models\Poll;
use App\Repositories\BaseRepository;

class PollRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'choice',
        'answer'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Poll::class;
    }
}
