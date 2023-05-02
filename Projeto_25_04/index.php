<?php
    // Recebe os dados do formulário via POST ou GET
    $prontuario = $_REQUEST["prontuario"];
    $nome = $_REQUEST["nome"];
    $nota_prova = $_REQUEST["nota_prova"];
    $nota_trabalho = $_REQUEST["nota_trabalho"];
    
    // Calcula a média aritmética
    $media = ($nota_prova + $nota_trabalho) / 2;
    
    // Verifica se o aluno foi aprovado ou está de recuperação
    if ($media >= 6) {
        $situacao = "Aprovado";
    } else {
        $situacao = "Recuperação";
    }
    
    // Grava as informações no arquivo alunos.txt
    $dados = "$prontuario|$nome|$nota_prova|$nota_trabalho|$media|$situacao\n";
    $fp = fopen("alunos.txt", "a");
    fwrite($fp, $dados);
    fclose($fp);
    
    // Redireciona para a página do menu
    header("Location: menu.php");
    exit;
    ?>