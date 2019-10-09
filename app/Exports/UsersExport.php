<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

// class UsersExport implements FromCollection
class UsersExport implements FromQuery, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return User::select('name', 'email');
    }
    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            Str::random(6)
        ];
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'uuid'
        ];
    }
}
