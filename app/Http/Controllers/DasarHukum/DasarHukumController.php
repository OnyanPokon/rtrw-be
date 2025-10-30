<?php

namespace App\Http\Controllers\DasarHukum;

use App\Http\Controllers\Controller;
use App\Http\Requests\DasarHukumRequest;
use App\Http\Resources\DasarHukumResources;
use App\Http\Services\DasarHukumService;
use App\Http\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class DasarHukumController extends Controller
{
    use ApiResponse;

    protected $dasarHukumService;

    public function __construct(DasarHukumService $dasarHukumService)
    {
        $this->dasarHukumService = $dasarHukumService;
    }

    public function index(Request $request)
    {
        try {
            $data = $this->dasarHukumService->getAll($request);

            return $this->successResponseWithDataIndex(
                $data,
                DasarHukumResources::collection($data),
                'Data dasar hukum berhasil diambil',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(DasarHukumRequest $request)
    {
        try {
            $this->dasarHukumService->store($request);

            return $this->successResponse(
                'Berhasil menambah data dasar hukum',
                Response::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                $e->getMessage(),
                Response::HTTP_BAD_REQUEST
            );
        } catch (ValidationException $e) {
            return $this->errorResponse(
                $e->errors(),
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function show($id)
    {
        try {
            $data = $this->dasarHukumService->show($id);

            return $this->successResponseWithData(
                DasarHukumResources::make($data),
                'Data dasar hukum berhasil diambil',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                $e->getMessage(),
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function update(DasarHukumRequest $request, $id)
    {
        try {
            $this->dasarHukumService->update($request, $id);

            return $this->successResponse(
                'Berhasil mengubah data dasar hukum',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                $e->getMessage(),
                Response::HTTP_BAD_REQUEST
            );
        } catch (ValidationException $e) {
            return $this->errorResponse(
                $e->errors(),
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function destroy($id)
    {
        try {
            $this->dasarHukumService->destroy($id);

            return $this->successResponse(
                'Berhasil menghapus data dasar hukum',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                $e->getMessage(),
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function multiDestroy(Request $request)
    {
        try {
            $this->dasarHukumService->multiDestroy($request->ids);

            return $this->successResponse(
                'Berhasil menghapus data dasar hukum',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                $e->getMessage(),
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
