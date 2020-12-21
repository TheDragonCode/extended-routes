<?php

namespace Tests\Fixtures;

class Controller
{
    public function index()
    {
        return response()->json('ok');
    }

    public function store()
    {
        return response()->json('ok');
    }

    public function trashed()
    {
        return response()->json('ok');
    }

    public function show($foo)
    {
        return response()->json($foo);
    }

    public function update($foo)
    {
        return response()->json($foo);
    }

    public function destroy($foo)
    {
        return response()->json($foo);
    }

    public function restore($foo)
    {
        return response()->json($foo);
    }
}
