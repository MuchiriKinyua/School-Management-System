<?php

namespace App\Repositories;

use App\Models\Upload;
use App\Repositories\BaseRepository;

class UploadRepository extends BaseRepository
{
    protected $fieldSearchable = [
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Upload::class;
    }
}
