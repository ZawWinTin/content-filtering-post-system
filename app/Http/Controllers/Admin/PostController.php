<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\PostRepository;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(): JsonResponse
    {
        $data = $this->postRepository->getAll();

        return response()->json($data);
    }

    public function show($id): JsonResponse
    {
        $data = $this->postRepository->show($id);

        return response()->json($data);
    }

    public function destroy($id): Response
    {
        $this->postRepository->destroy($id);

        return response()->noContent();
    }

    public function restore($id): JsonResponse
    {
        $data = $this->postRepository->restore($id);

        return response()->json($data);
    }
}
