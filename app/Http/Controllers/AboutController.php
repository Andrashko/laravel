<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    private string $template = <<<PAGE
        <h1> CV </h1>
        <b> Yurii Andrashko </b>
    PAGE;

    public function index(): string {
        return $this->template;
    }
}
