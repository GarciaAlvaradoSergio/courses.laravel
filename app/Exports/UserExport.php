<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserExport implements FromView, WithTitle
{
    public function title(): string
    {
        return 'Lista de Usuarios';    //Para poder poner un titulo a la Hoja de Excel con WithTitle.
    }

    public function view(): View
    {
        return view('reports.users.report-Excel', [
            'users' => User::all(),
        ]);
    }
}
