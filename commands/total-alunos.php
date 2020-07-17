<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classeAluno = Aluno::class;

$dql = "SELECT COUNT(alunos) FROM $classeAluno alunos";
$query = $entityManager->createQuery($dql);

$resultado = $query->getSingleScalarResult();

echo "Total de alunos: {$resultado}" . PHP_EOL;