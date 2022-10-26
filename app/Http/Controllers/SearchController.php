<?php

namespace App\Http\Controllers;

use App\Actions\SearchAction;
use App\Http\Requests\SearchRequest;
use App\Searchables\ViaCepApi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function index()
    {
        //
    }

    public function store(SearchRequest $request)
    {
        $search = (new SearchAction)->run( $request->search);

        return response()->json($search, Response::HTTP_CREATED);
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
