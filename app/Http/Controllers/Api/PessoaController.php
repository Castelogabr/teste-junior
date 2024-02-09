<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PessoaStoreRequest;
use App\Http\Requests\PessoaUpdateRequest;
use App\Services\PessoaServiceInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PessoaController extends Controller
{
    /**
     * @var PessoaServiceInterface
     */
    private $pessoaService;

    public function __construct(PessoaServiceInterface $pessoaService)
    {
        $this->pessoaService = $pessoaService;
    }

    public function index(): JsonResponse
    {
        $pessoas = $this->pessoaService->all();
        return response()->json($pessoas);
    }

    public function show($id): JsonResponse
    {
        $pessoa = $this->pessoaService->find($id);

        if (!$pessoa) {
            return response()->json(['message' => 'Pessoa não encontrada'], 404);
        }

        return response()->json($pessoa);
    }

    public function store(PessoaStoreRequest $request): JsonResponse
    {
        $pessoa = $this->pessoaService->create($request->all());
        if ($pessoa) {
            return response()->json($pessoa, Response::HTTP_OK);
        }
        return response()->json($pessoa, Response::HTTP_BAD_REQUEST);
    }

    public function update(PessoaUpdateRequest $request, $id): JsonResponse
    {
        $pessoa = $this->pessoaService->update($request->all(), $id);
        if ($pessoa) {
            return response()->json($pessoa, Response::HTTP_OK);
        }
        return response()->json(['message' => 'Pessoa não encontrada'], Response::HTTP_BAD_REQUEST);
    }
    

    public function delete($id): JsonResponse
    {
        $deleted = $this->pessoaService->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Pessoa excluída com sucesso']);
        }
        return response()->json(['message' => 'Pessoa não encontrada'], 404);
    }
}