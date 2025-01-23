<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use TallStackUi\Traits\Interactions;

class CacheController extends Controller
{
    use Interactions;
    public function clear()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Cache limpo com sucesso!');
    }
}
