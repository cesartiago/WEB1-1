<?php
include_once("conexao.php");

if(isset($_POST['cpf']) || isset($_POST['senha'])) {

    /*
    if(strlen($_POST['cpf']) == 0) {
        echo "Preencha seu cpf";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
    */

        $cpf = $conn->real_escape_string($_POST['cpf']); //A gente compara embaixo. Real_escape_string limpa, antes de enviar pro select, pra ser só string.
        $senha = $conn->real_escape_string($_POST['senha']);

        #ABAIXO MUDE PARA $sql_cliente, pq NAO É SPO ALUNO MAIS!
        $sql_aluno = "SELECT * FROM Cliente WHERE cpf = '$cpf' AND senha = '$senha'"; //Criamos o comando "SELECIONE NO BANCO PELO OQ O USUÁRIO ENVIOU"
        $faca_a_querry =  mysqli_query($conn, $sql_aluno); //EXECUTAMOS O SELECT/A PROJEÇÃO ACIMA. NOS RETORNA UMA MATRIZ, PODE SER DE ALTURA 1.
        $resultado = mysqli_fetch_assoc($faca_a_querry); //Obtem uma linha do conjunto de resultados. No nosso caso, só tem um resultado, e uma linha só.
        
        //Valida login:
        if (empty($resultado)) {
            $_SESSION['loginErro'] = "Usuario ou senha invalido";
            header("Location: loginAluno.php"); //POR PÁGINA DE LOGIN, PQ NÃO TEM RESULTADOS NA NOSSA CONSULTA

        }else if (!empty($resultado)){

            //tentei o "pg_query" mas nem identificou a função. Não foi assim
            $sql_tipo = "SELECT * FROM cliente WHERE cpf = '$cpf'"; //TIVE QUE FAZER SELECT de tudo (*)
            $faca_a_querry_tipo =  mysqli_query($conn, $sql_tipo); //EXECUTAMOS O SELECT/A PROJEÇÃO ACIMA. NOS RETORNA UMA MATRIZ, PODE SER DE ALTURA 1.
            $resultado_tipo = mysqli_fetch_array ($faca_a_querry_tipo); //"Busca uma linha de dados do conjunto de resultados e a retorna como uma matriz. Cada chamada subsequente para essa função retornará a próxima linha no conjunto de resultados ou null se não houver mais linhas."
            $valor_unico_atributo = $resultado_tipo["tipo"];

            #echo $valor_unico_atributo;


            
            if ($valor_unico_atributo == 1){
                header("Location: menuAluno.php"); //POR PÁGINA DE LOGIN, PQ NÃO TEM RESULTADOS NA NOSSA CONSULTA
            }

            if ($valor_unico_atributo == 2){
                header("Location: MenuProfessor.html"); //POR PÁGINA DE LOGIN, PQ NÃO TEM RESULTADOS NA NOSSA CONSULTA
            }

            if ($valor_unico_atributo == 3){
                header("Location: MenuCoordenador.html"); //POR PÁGINA DE LOGIN, PQ NÃO TEM RESULTADOS NA NOSSA CONSULTA
            }
            

            
            
        }


        #$sql_tipo = "SELECT tipo FROM Cliente WHERE cpf = '$cpf'"; th

        /* HELON AQUI PRA BAIXO:
        $sql_query = $conn->query($sql_aluno) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! Cpf ou senha incorretos";
        }
        */
        
        /* 
        $sql_coo = "SELECT FROM usuarios WHERE cpf = '$login' AND senha = '$senha' AND tipo = '2'";
        $sql_queryy = $mysqli->query($sql_coo) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_queryy->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_queryy->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

        $sql_prof = "SELECT FROM usuarios WHERE cpf = '$login' AND senha = '$senha' AND tipo = '3'";
        $sql_queryyy = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_queryyy->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_queryyy->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
        */
        


    //DO ELSE ANTIGO}

}

?>