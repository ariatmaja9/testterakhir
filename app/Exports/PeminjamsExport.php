<?php

namespace App\Exports;

use App\Models\Peminjam;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Peminjam::all();
    }

    public function headings(): array
    {
    return [
        'id_pinjam',
        'id_buku',
        'id_member',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status_pinjam',
        'denda',
        ];
    }

}
