<?php

use Aluno\Aluno;
use Turma\Turma;

include_once('Model/Aluno.php');
include_once('Model/Turma.php');

include('layout/header.php');



$aluno1 = new Aluno();
$aluno1->adicionarDados(
    "Jonatan Renan",
    "21114086-5",
    8.5,
    9.2,
    4.3,
    9.5
);


$aluno2 = new Aluno();
$aluno2->adicionarDados(
    "Jose de Abreu Silva",
    "25315686-5",
    8.5,
    9.5,
    10.0,
    9.5
);


$aluno3 = new Aluno();
$aluno3->adicionarDados(
    "Romulo Arantes",
    "23455566-5",
    5.5,
    9.2,
    10.0,
    9.5
);

$aluno4 = new Aluno();
$aluno4->adicionarDados(
    "Rita de Lemon",
    "23503563-1",
    6.5,
    9.5,
    2.0,
    9.5
);

$aluno5 = new Aluno();
$aluno5->adicionarDados(
    "Josef Albert",
    "16403500-1",
    6.5,
    3.5,
    10.0,
    9.5
);

$aluno6 = new Aluno();
$aluno6->adicionarDados("Joaquim", "16431330-1", 4.8, 9.0, 5.5, 4.3);

$alunos = [$aluno1, $aluno2, $aluno3, $aluno4, $aluno5, $aluno6];

$turma = new Turma('A-150');

foreach ($alunos as $aluno) {
    $turma->adicionarAluno($aluno);
}
//print_r($alunos);
//echo "</br></br>";
//print_r($turma);

echo "<div id='title'>";
echo "<h1>Controle de Notas de Turma</h1>";
echo "</div>";
echo "<div id='subtitle'>";
echo "<h1>Notas dos alunos da Turma " . $turma->getTurma() . "<h1>";
echo "</div>";

echo "<div id='body'>";
echo "<h3> >>Média Turma: " . $turma->mediaTurma() . "</h3>";
echo $turma->imprimirTurma();

include('layout/footer.php');
