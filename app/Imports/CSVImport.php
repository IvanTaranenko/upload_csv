<?php

namespace App\Imports;

use App\Models\InvalidData;
use App\Models\ValidData;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CSVImport implements ToModel, WithBatchInserts, WithChunkReading, ShouldQueue
{
    use RemembersChunkOffset;

    public function model(array $row)
    {
        $chunkOffset = $this->getChunkOffset();

        $hasNumberOrNull = false;
        foreach ($row as $cell) {
            if (is_numeric($cell) || $cell === null) {
                $hasNumberOrNull = true;
                break;
            }
        }
        if ($hasNumberOrNull) {
            $existingData = InvalidData::where([
                'column1' => $row[0],
                'column2' => $row[1],
                'column3' => $row[2],
                'column4' => $row[3],
                'column5' => $row[4],
                'column6' => $row[5],
                'column7' => $row[6],
                'column8' => $row[7],
            ])->first();

            if (!$existingData) {
                return new InvalidData([
                    'column1' => $row[0],
                    'column2' => $row[1],
                    'column3' => $row[2],
                    'column4' => $row[3],
                    'column5' => $row[4],
                    'column6' => $row[5],
                    'column7' => $row[6],
                    'column8' => $row[7],
                ]);
            }
        } else {
            return new ValidData([
                'column1' => $row[0],
                'column2' => $row[1],
                'column3' => $row[2],
                'column4' => $row[3],
                'column5' => $row[4],
                'column6' => $row[5],
                'column7' => $row[6],
                'column8' => $row[7],
            ]);
        }
    }

    public function batchSize(): int
    {
        return 100;
    }
    public function chunkSize(): int
    {
        return 200;
    }
}
