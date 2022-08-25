<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;



class QuizzesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $quiz = Quiz::query()->whereId($this->id)->first();
        return $quiz->studentsResults;
    }
}
