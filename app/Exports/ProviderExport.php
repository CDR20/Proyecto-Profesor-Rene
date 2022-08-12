<?php

namespace App\Exports;

use App\Models\Provider;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProviderExport implements FromView
{
    public function view(): View
    {
        return view('exports.providers', [
            'providers' => Provider::all()
        ]);
    }
}
