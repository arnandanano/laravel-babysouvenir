<?php

namespace App\Exports;

use App\Models\Nota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanPenjualanExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Nota::with(['relationToPembayaran', 'relationToProduk'])->whereBetween('created_at', [$this->startDate, $this->endDate])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Order',
            'Nama Pemesan',
            'Barang',
            'Qty',
            'Tanggal Acara',
            'Total',
            'Catatan',
            'Created_at',
            'Updated_at',
            'Pembayaran'
        ];
    }
}
