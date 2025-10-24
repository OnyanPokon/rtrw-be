<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use App\Http\Requests\RtrwRequest;
use App\Http\Resources\RtrwResources;
use App\Http\Services\RtrwService;
use App\Http\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class RtrwController extends Controller
{
    use ApiResponse;

    protected $rtrwService;

    public function __construct(RtrwService $rtrwService)
    {
        $this->rtrwService = $rtrwService;
    }

    public function index(Request $request)
    {
        try {
            $data = $this->rtrwService->getAll($request);

            return $this->successResponseWithDataIndex(
                $data,
                RtrwResources::collection($data),
                'Data RTRW berhasil diambil',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(RtrwRequest $request)
    {
        try {
            $this->rtrwService->store($request);

            return $this->successResponse(
                'Berhasil menambah data RTRW',
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
            $data = $this->rtrwService->show($id);

            return $this->successResponseWithData(
                RtrwResources::make($data),
                'Data RTRW berhasil diambil',
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                $e->getMessage(),
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function update(RtrwRequest $request, $id)
    {
        try {
            $this->rtrwService->update($request, $id);

            return $this->successResponse(
                'Berhasil mengubah data RTRW',
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
            $this->rtrwService->destroy($id);

            return $this->successResponse(
                'Berhasil menghapus data RTRW',
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
            $this->rtrwService->multiDestroy($request->ids);

            return $this->successResponse(
                'Berhasil menghapus data RTRW',
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
