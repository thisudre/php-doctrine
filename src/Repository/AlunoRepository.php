<?php

namespace Alura\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        $query = $this->createQueryBuilder('alunos')
        ->join('alunos.telefones','telefones')
        ->join('alunos.cursos', 'cursos')
        ->addSelect('telefones')
        ->addSelect('cursos')
        ->getQuery();

        return $query->getResult();
    }
}
