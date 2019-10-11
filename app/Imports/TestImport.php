<?php

namespace App\Imports;

use App\Test;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class TestImport implements ToModel, WithChunkReading, ShouldQueue
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Test([
            'name' => $row[0],
            'email' => $row[1]
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
