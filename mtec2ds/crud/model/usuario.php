<?php

class Aluno
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function listar()
    {
        $sql = "
            SELECT
                aluno.id,
                aluno.nome,
                aluno.email,
                curso.nome AS curso,
                curso.carga_horaria
            FROM aluno
            LEFT JOIN curso
                ON curso.id = aluno.id_curso
            ORDER BY aluno.id ASC
        ";

        $resultado = $this->con->query($sql);

        $alunos = [];

        if (!$resultado) {
            return $alunos;
        }

        while ($linha = $resultado->fetch_assoc()) {
            $alunos[] = $linha;
        }

        return $alunos;
    }
}
?>
