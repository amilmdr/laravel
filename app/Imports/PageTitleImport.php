<?php

namespace App\Imports;

use App\Models\PageTitle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class PageTitleImport implements ToModel,
WithHeadingRow,
SkipsOnError,
WithValidation,
SkipsOnFailure,
WithBatchInserts
{
    use Importable,SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PageTitle([
            "page_titles_name"=>$row['page_titles_name'],
        ]);
    }
    // public function onError(Throwable $error){

    // }
    public function rules():array
    {
        return[
            '*.page_titles_name'=>['unique:page_titles,page_titles_name']
        ];
    }
    
	/**
	 *
	 * @param \Maatwebsite\Excel\Validators\Failure $failures
	 *
	 * @return mixed
	 */
	// function onFailure(Failure ...$failure) {
	// }
	/**
	 *
	 * @return int
	 */
	function batchSize(): int {
        return (100);
	}
}
