<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(): JsonResponse
    {
        $data = $this->userRepository->getAll();

        return response()->json($data);
    }

    public function show($id): JsonResponse
    {
        $data = $this->userRepository->show($id);

        return response()->json($data);
    }

    public function getPosts($id): JsonResponse
    {
        $data = $this->userRepository->getPosts($id);

        return response()->json($data);
    }

    public function destroy($id): Response
    {
        $this->userRepository->destroy($id);

        return response()->noContent();
    }

    public function restore($id): JsonResponse
    {
        $data = $this->userRepository->restore($id);

        return response()->json($data);
    }
}
