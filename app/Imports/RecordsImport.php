<?php

namespace App\Imports;

use App\Models\Record;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class RecordsImport implements ToCollection, WithChunkReading, WithHeadingRow
{
    protected $uploadFileId;

    public function __construct($uploadFileId)
    {
        $this->uploadFileId = $uploadFileId;
    }

    public function collection(Collection $rows)
    {
        $records = $rows->map(function ($row) {
            return [
                'field1' => $row['field1'] ?? null,
                'field2' => $row['field2'] ?? null,
                'field3' => $row['field3'] ?? null,
                'field4' => $row['field4'] ?? null,
                'upload_file_id' => $this->uploadFileId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

       // Bulk record hoga*
        Record::insert($records);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
