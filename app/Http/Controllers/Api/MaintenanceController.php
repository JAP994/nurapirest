<?php

namespace App\Http\Controllers\Api;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaintenanceRequest;
use App\Http\Resources\MaintenanceResource;
use Symfony\Component\HttpKernel\Exception\HttpException;


class MaintenanceController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MaintenanceResource::collection(Maintenance::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaintenanceRequest $request)
    {
        try {
            $maintenance = new Maintenance;
            $maintenance->fill($request->validated())->save();

            return new MaintenanceResource($maintenance);

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
        $maintenance = Maintenance::findOrfail($id);

        return new MaintenanceResource($maintenance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaintenanceRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
           $maintenance = Maintenance::find($id);
           $maintenance->fill($request->validated())->save();

           return new MaintenanceResource($maintenance);

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
        $maintenance = Maintenance::findOrfail($id);
        $maintenance->delete();

        return response()->json(null, 204);
    }
}
