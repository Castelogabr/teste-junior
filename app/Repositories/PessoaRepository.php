<?php

namespace App\Repositories;

use App\Entities\Pessoa;
use Illuminate\Support\Collection;

class PessoaRepository
{
    /**
     * Retorna todas as pessoas.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return Pessoa::all();
    }

      /**
     * Encontra uma pessoa por ID.
     *
     * @param int $id
     * @return Pessoa|null
     */
    public function find($id): ?Pessoa
    {
        return Pessoa::find($id);
    }

    /**
    * Cria uma nova pessoa com dados fornecidos.
     *
     * @param array $data dados da pessoa a serem inseridos.
     * @return Pessoa nova pessoa criada.
     */     
    public function create(array $data): ?Pessoa
    {
        return Pessoa::create($data);
    }

    /**
     * Atualiza os dados de uma pessoa existente pelo ID.
     *
     * @param array $data dados da pessoa a serem atualizados.
     * @param int $id ID da pessoa a ser atualizada.
     * @return Pessoa|null A pessoa atualizada.
     */
    public function update(array $data, $id): ?Pessoa
    {
        $pessoa = Pessoa::find($id);

        if (!$pessoa) {
            return null;
        }

        $pessoa->fill($data);
        $pessoa->save();

        return $pessoa;
    }
    
     /**
     * Deleta uma pessoa pelo ID.
     *
     * @param int $id ID da pessoa a ser deletada.
     * @return bool True se a pessoa foi deletada com sucesso, False caso contrário.
     */
    public function delete($id): bool
    {
        $pessoa = Pessoa::find($id);

        if (!$pessoa) {
            return false;
        }

        return $pessoa->delete();
    }
}