<?php

namespace App\Domains\FirstEntity\Http\Controllers\Api\Firstentity;

use App\Http\Controllers\Controller;
use App\Domains\FirstEntity\Models\Firstentity;
use Illuminate\Http\Request;

/**
 * Class FirstentityController.
 */
class FirstentityController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/firstentity",
     * summary="Get All Firstentitys",
     * description="Show All Firstentitys",
     * operationId="getAllFirstentitys",
     * tags={"Firstentity"},
     * @OA\Response(
     *    response=200,
     *    description="Returns when Firstentity are found",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
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
        return Firstentity::all();
    }



    /**
     * @OA\Get(
     * path="/api/firstentity/{id}",
     * summary="Get Firstentity by id",
     * description="Show one Firstentity by id",
     * operationId="getOneFirstentitys",
     * tags={"firstentity"},
     * @OA\Parameter(
     *    description="ID of firstentity",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when firstentity id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Firstentity is found",
     *    @OA\JsonContent(
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function show(Firstentity $firstentity)
    {
        return $firstentity;
    }

    /**
     * @OA\Post (
     * path="/api/firstentity",
     * summary="Create New Firstentity",
     * description="Create One Firstentity",
     * operationId="postOneFirstentitys",
     * tags={"firstentity"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Firstentity fields",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
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
     *    description="Returns when Firstentity has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function store(Request $request)
    {
        $firstentity = Firstentity::create($request->all());
        return response()->json($firstentity, 201);
    }

    /**
     * @OA\Put  (
     * path="/api/firstentity/{id}",
     * summary="Edit one Firstentity by id",
     * description="update One Firstentity by id",
     * operationId="postOneFirstentitys",
     * tags={"firstentity"},
     * @OA\Parameter(
     *    description="ID of firstentity",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Firstentity fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Firstentity has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:04:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function update(Request $request, Firstentity $firstentity)
    {
        $firstentity->update($request->all());

        return response()->json($firstentity, 200);
    }

    /**
     * @OA\Delete (
     * path="/api/firstentity/{id}",
     * summary="delete Firstentity by id",
     * description="delete one Firstentity by id",
     * operationId="deleteOneFirstentitys",
     * tags={"firstentity"},
     * @OA\Parameter(
     *    description="ID of firstentity",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when firstentity id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Firstentitys are found",
     *    @OA\JsonContent(
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="2021-03-10T15:47:13.000000Z"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function delete(Firstentity $firstentity)
    {
        $firstentity->delete();

        return response()->json($firstentity, 200);
    }
}