<?php

namespace App\Http\Controllers;

use App\Models\Responsible;
use Illuminate\Http\Request;

class ResponsibleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Responsible $responsible
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Responsible $responsible)
    {
        $responsible->delete();

        return response()->noContent();
    }
}
