<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class Controller
{
    /**
     * Validasi request berdasarkan aturan yang diberikan.
     *
     * @param  Request  $request
     * @param  array  $rules
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateRequest(Request $request, array $rules)
    {
        Validator::make($request->all(), $rules)->validate();
    }
}
