<?php

namespace App\Http\Controllers;

use App\Models\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Terms::get();

        return view('terms', [
            'terms' => $terms->first()
        ]);
    }
}
