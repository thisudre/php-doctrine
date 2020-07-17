<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunos */
$alunos = $alunoRepository->buscaCursosPorAluno();

foreach ($alunos as $aluno) {
    $telefones = $aluno->getTelefones()->map(function (Telefone $telefone)
    {
        return $telefone->getNumero();
    })->toArray();

    echo "Aluno: {$aluno->getNome()}" . PHP_EOL . "Telefones: " . implode(", ", $telefones) . PHP_EOL;
    
    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "\tID: {$curso->getId()}\tNome: {$curso->getNome()}" . PHP_EOL;
    }

    echo PHP_EOL;
}

