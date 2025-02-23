<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\General\PostRepository;
use App\Http\Requests\General\PostCreateRequest;
use App\Http\Requests\General\PostUpdateRequest;

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

    public function store(PostCreateRequest $request): JsonResponse
    {
        $data = $this->postRepository->store($request);

        return response()->json($data);
    }

    public function update(PostUpdateRequest $request): JsonResponse
    {
        $data = $this->postRepository->update($request);

        return response()->json($data);
    }

    public function destroy($id): Response
    {
        $this->postRepository->destroy($id);

        return response()->noContent();
    }

    public function report($id): Response
    {
        $this->postRepository->report($id);

        return response()->noContent();
    }
}
