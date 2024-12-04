<?php

namespace App\Repositories;

use App\Models\Upload;
use App\Repositories\BaseRepository;

class UploadRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'uploaded_by',
        'status'
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
