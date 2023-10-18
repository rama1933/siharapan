<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaRepository
{
    public function __construct()
    {
    //
    }

    public function StoreFileBerita(Request $request, $id = null)
    {
        if ($id == null) {
            $file = $request->file('path');
            $store = $request->file('path')->store('berita', 'public');
            return $store;
        }
        else {
            if ($request->hasFile('path')) {
                $file = $request->file('path');
                $store = $request->file('path')->store('berita', 'public');
                return $store;
            }
            else {
                return Berita::find($id)->path;
            }
        }
    }
}
