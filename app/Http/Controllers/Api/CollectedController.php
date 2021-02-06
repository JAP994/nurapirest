<?php

namespace App\Http\Controllers\Api;

use App\Models\Collected;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollectedRequest;
use App\Http\Resources\CollectedResource;
use Symfony\Component\HttpKernel\Exception\HttpException;


class CollectedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CollectedResource::collection(Collected::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectedRequest $request)
    {
        try {
            $collected = new Collected;
            $collected->fill($request->validated())->save();

            return new CollectedResource($collected);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collected = Collected::findOrfail($id);

        return new CollectedResource($collected);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectedRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
           $collected = Collected::find($id);
           $collected->fill($request->validated())->save();

           return new CollectedResource($collected);

        } catch(\Exception $exception) {
           throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collected = Collected::findOrfail($id);
        $collected->delete();

        return response()->json(null, 204);
    }
}