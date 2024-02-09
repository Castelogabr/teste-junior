<?php

namespace App\Services;

use App\Repositories\PessoaRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PessoaService implements PessoaServiceInterface
{
    /**
     * @var PessoaRepository
     */
    private $pessoaRepo;

    public function __construct(PessoaRepository $pessoaRepository)
    {
        $this->pessoaRepo = $pessoaRepository;
    }

     /**
     * Retorna todas as pessoas.
     *
     * @return Collection|null
     */
    public function all(): Collection
    {
        return $this->pessoaRepo->all();
    }

   /**
     * Busca uma pessoa pelo ID.
     *
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->pessoaRepo->find($id);
    }

    /**
     * Cria uma nova pessoa com os dados fornecidos.
     *
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        return $this->pessoaRepo->create($data);
    }

    /**
     * Atualiza os dados de uma pessoa pelo ID.
     *
     * @param array $data
     * @param int $id
     * @return Model|null
     */
    public function update(array $data, int $id): ?Model
    {
        return $this->pessoaRepo->update($data, $id);
    }

    /**
     * Deleta uma pessoa pelo ID.
     *
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool
    {
        return $this->pessoaRepo->delete($id);
    }
    
}