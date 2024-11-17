<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProduksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produk::all();
    }
    public function headings(): array
    {
        return [
            'Id Buku',
            'Judul Buku',
            'Pengarang',
            'Id Kategori',
            'Tahun Terbit',
            'Gambar',
            'Created At',
            'Updated At',
        ];
    }
}
