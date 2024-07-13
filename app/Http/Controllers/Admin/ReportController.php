<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\ReportRepository;
use App\Http\Requests\Admin\ReportUpdateRequest;

class ReportController extends Controller
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index(): JsonResponse
    {
        $data = $this->reportRepository->getAll();

        return response()->json($data);
    }

    public function update(ReportUpdateRequest $request): Response
    {
        $this->reportRepository->update($request);

        return response()->noContent();
    }
}
