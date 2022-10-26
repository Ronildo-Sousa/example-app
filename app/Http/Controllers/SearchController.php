<?php

namespace App\Http\Controllers;

use App\Actions\SearchAction;
use App\Http\Requests\SearchRequest;
use App\Models\Search;
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

    public function show(Search $search)
    {
        return response()->json($search, Response::HTTP_OK);
    }

    public function destroy(Search $search)
    {
        $search->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
