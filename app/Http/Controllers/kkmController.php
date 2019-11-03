<?php

namespace App\Http\Controllers;

use App\kkm;
use Illuminate\Http\Request;

class kkmController extends Controller
{
    public function update(Request $request, $id)
    {
      $d = kkm::where('id', $id) -> first();
      $d->predA1 = $request->predA1;
      $d->predA2 = $request->predA2;

      $d->predB1 = $request->predB1;
      $d->predB2 = $request->predB2;

      $d->predC1 = $request->predC1;
      $d->predC2 = $request->predC2;

      $d->predD1 = $request->predD1;
      $d->predD2 = $request->predD2;

      $d->update();
      return redirect('/dashboard') -> with(['sukses' => "Sukses mengupdate kkm nilai"]);
    }
}
