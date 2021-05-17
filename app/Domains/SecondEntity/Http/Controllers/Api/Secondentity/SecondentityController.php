<?php

namespace App\Domains\SecondEntity\Http\Controllers\Api\Secondentity;

use App\Http\Controllers\Controller;
use App\Domains\SecondEntity\Models\Secondentity;
use Illuminate\Http\Request;

/**
 * Class SecondentityController.
 */
class SecondentityController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/secondentity",
     * summary="Get All Secondentitys",
     * description="Show All Secondentitys",
     * operationId="getAllSecondentitys",
     * tags={"Secondentity"},
     * @OA\Response(
     *    response=200,
     *    description="Returns when Secondentity are found",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="test", type="string", example="1"),
     *       @OA\Property(property="test2", type="increments", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function index()
    {
        return Secondentity::all();
    }



    /**
     * @OA\Get(
     * path="/api/secondentity/{id}",
     * summary="Get Secondentity by id",
     * description="Show one Secondentity by id",
     * operationId="getOneSecondentitys",
     * tags={"secondentity"},
     * @OA\Parameter(
     *    description="ID of secondentity",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when secondentity id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Secondentity is found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="test", type="string", example="1"),
     *       @OA\Property(property="test2", type="increments", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function show(Secondentity $secondentity)
    {
        return $secondentity;
    }

    /**
     * @OA\Post (
     * path="/api/secondentity",
     * summary="Create New Secondentity",
     * description="Create One Secondentity",
     * operationId="postOneSecondentitys",
     * tags={"secondentity"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Secondentity fields",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="test", type="string", example="1"),
     *       @OA\Property(property="test2", type="increments", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when name or description deos'nt o the RequestBody ",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="name and description field are required"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Secondentity has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="test", type="string", example="1"),
     *       @OA\Property(property="test2", type="increments", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function store(Request $request)
    {
        $secondentity = Secondentity::create($request->all());
        return response()->json($secondentity, 201);
    }

    /**
     * @OA\Put  (
     * path="/api/secondentity/{id}",
     * summary="Edit one Secondentity by id",
     * description="update One Secondentity by id",
     * operationId="postOneSecondentitys",
     * tags={"secondentity"},
     * @OA\Parameter(
     *    description="ID of secondentity",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Secondentity fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="test", type="string", example="1"),
     *       @OA\Property(property="test2", type="increments", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Secondentity has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="test", type="string", example="1"),
     *       @OA\Property(property="test2", type="increments", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:04:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function update(Request $request, Secondentity $secondentity)
    {
        $secondentity->update($request->all());

        return response()->json($secondentity, 200);
    }

    /**
     * @OA\Delete (
     * path="/api/secondentity/{id}",
     * summary="delete Secondentity by id",
     * description="delete one Secondentity by id",
     * operationId="deleteOneSecondentitys",
     * tags={"secondentity"},
     * @OA\Parameter(
     *    description="ID of secondentity",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when secondentity id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Secondentitys are found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="test", type="string", example="1"),
     *       @OA\Property(property="test2", type="increments", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="2021-03-10T15:47:13.000000Z"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function delete(Secondentity $secondentity)
    {
        $secondentity->delete();

        return response()->json($secondentity, 200);
    }
}