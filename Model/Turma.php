<?php // phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols

namespace Turma;

use Aluno\Aluno;

require_once('Aluno.php');

class Turma
{
    protected $alunos;
    private $turma;
    private $numAlunos = 0;
    public function __construct($turma)
    {
        $this->setTurma($turma);
    }
    public function getTurma()
    {
        return $this->turma;
    }

    public function setTurma($turma): bool
    {
        if (is_string($turma) && strlen($turma) <= 5) {
            $this->turma = $turma;
            return true;
        } else {
            return false;
        }
    }

    public function adicionarAluno(Aluno $aluno)
    {
        if ($this->numAlunos <= 4) {
            $this->alunos[$this->numAlunos] = $aluno;
            echo 'O aluno ' . $aluno->getNome() . ' foi inserido com sucesso na turma </br>';
            $this->numAlunos++;
        } else {
            echo "<div id='error'>A turma já está cheia</div>";
        }
    }
    public function mediaTurma()
    {
        global $somaMediaAluno;
        $somaMediaAluno = 0;
        for ($i = 0; $i < count($this->alunos); $i++) {
            $somaMediaAluno += $this->alunos[$i]->getMedia();
        }

        $mediaTurma = $somaMediaAluno / count($this->alunos);

        return $mediaTurma;
    }

    public function imprimirTurma()
    {
        foreach ($this->alunos as $aluno) {
            echo "</br>";
            echo "<h3>";
            echo ">>" . $aluno->getNome();
            echo "</h3>";
            $table = "<table border=1>";
            $table .= "<thead>";
            $table .= "<tr>";
            $table .= "<td>Nota1</td>";
            $table .= "<td>Nota2</td>";
            $table .= "<td>Nota3</td>";
            $table .= "<td>Nota4</td>";
            $table .= "<td>Média</td>";
            $table .= "</tr>";
            $table .= "</thead>";
            $table .= "<tbody>";
            $table .= "<tr>";
            $table .= "<td>";
            $table .= $aluno->getNota1();
            $table .= "</td>";
            $table .= "<td>";
            $table .= $aluno->getNota2();
            $table .= "</td>";
            $table .= "<td>";
            $table .= $aluno->getNota3();
            $table .= "</td>";
            $table .= "<td>";
            $table .= $aluno->getNota4();
            $table .= "</td>";
            $table .= "<td>";
            $table .= $aluno->getMedia();
            $table .= "</td>";
            $table .= "</tr>";
            $table .= "</tbody>";
            $table .= "</table>";
            echo $table;
        }
    }
}
