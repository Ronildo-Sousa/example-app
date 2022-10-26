<?php

namespace App\Http\Controllers;

use App\Actions\SearchAction;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function index()
    {
        return response()->json(auth()->user()->searches, Response::HTTP_OK);
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
