<?php include("Conexao/conexao.php");?>
<?php include("header.php");?>
<?php
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
    $pasta = 'nav';
    //$permitida = array('','','');

    if(isset($_GET['s']) && $_GET['s'] != ''){
        include("$pasta/busca.php");
    }
    elseif(isset($_Get['single']) && $_Get['single'] != ''){
        include("pasta/single.php");
    }
    elseif (isset($_Get['categoria']) && $_GET['categoria'] != ''){
        include("$pasta/categoria.php");
    }
    elseif (!isset($pagina) || $pagina == '') {
        include("$pasta/home.php");
    }
    elseif (file_exists("$pasta/".$pagina.'.php')) {
        include("$pasta/$pagina".'.php');
    }
    elseif (!file_exists("$pasta/".$pagina.'.php')) {
        include("$pasta/erro.php");
    }
    
    /*
    elseif (file_exists("$pasta/".$pagina.'.php') && in_array($pagina, $permitida)) {
        include("$pasta/$pagina".'.php');
    }
    elseif (!file_exists("$pasta/".$pagina.'.php') && !in_array($pagina, $permitida)) {
        include("$pasta/erro.php");
    }

    /*
    foreach ($_REQUEST as $_opt -> $_val){
            $_opt = $_val;
        }
        if(empty($pagina)){
            include("Nav/home.php");
        }
        else if(substr($pagina, 0,4)=='http' or substr($pagina,
                0, 1)=="/" or substr($pagina, 0, 1)=="."){
            echo "Erro: pagina não encontrada";
        }
        else{
            include("$pagina.php");
        }
     */
?>
<?php // include("footer.php");?>