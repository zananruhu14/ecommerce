<?php

namespace App\Imports;

use App\Models\Barcode;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class BarcodeImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure, WithBatchInserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $weaving;


    public function  __construct($weaving)
    {
        $this->weaving = $weaving;
        // dd($this->weaving);
    }
    public function model(array $row)
    {
        return new Barcode([
            'd_barcode'     => $row['d_barcode'],
            'customer_name'    => $row['customer_name'],
            'style_no'    => $row['style_no'],
            'opo'    =>  $row['opo'],
            'combo_id'     => $row['combo_id'],
            'size_no'    => $row['size_no'],
            'lot_no'    => $row['lot_no'],
            'brand_seq'    =>  $row['brand_seq'],
            'qty'     => $row['qty'],
            'barcode'    => $row['barcode'],
            'pn_no'    => $row['pn_no'],
            'h_barcode'    =>  $row['h_barcode'],
            'user_id'    =>  $row['user_id'],
            'weaving_number'    => $this->weaving,


        ]);
    }

    public function rules(): array
    {
        return [
            '*.d_barcode' => 'unique:barcodes,d_barcode',
            '*.barcode' => 'unique:barcodes,barcode',
            '*.h_barcode' => 'required'
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
    }

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
    public function chunkSize(): int
    {
        return 10000;
    }

    public function batchSize(): int
    {
        return 10000;
    }
}
