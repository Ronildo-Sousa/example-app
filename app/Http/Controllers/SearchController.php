<?php

namespace App\Http\Controllers;

use App\Actions\SearchAction;
use App\Http\Requests\SearchRequest;
use App\Searchables\ViaCepApi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        //
    }

    public function store(SearchRequest $request)
    {
        (new SearchAction)->run( $request->search);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
