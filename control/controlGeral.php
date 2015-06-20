<?php

class ControlGeral {

    public function __construct(){
        if (!isset($_COOKIE['logado'])){
            header("location:http://".$_SERVER['HTTP_HOST'].'/sgf');
        }
    }

    #data no formato brasileiro
    function data($data) {

        if ($data == null) {
            return '';
        } else {
            return date('d/m/Y', strtotime($data));
        }
    }

    #validar cpf
    function validaCPF($cpf) { // Verifiva se o número digitado contém todos os digitos
        $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);

        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return false;
        } else {   // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    #mostrar menagem de alerta
    function alerta($msg,$tipo) {
        $alerta = "<div class='alert alert-$tipo'>";
        $alerta.='<button type="button" class="close" data-dismiss="alert">×</button>';
        $alerta.='<strong>Informação: </strong>' . $msg . '</div>';
        $_SESSION['mensagem'] = $alerta;
        return $alerta;
    }

    #contruir o menu
    function menu() {
        echo '<div class="navbar navbar-inverse">';
        echo '<div class="navbar-inner">';
        echo '<a class="brand" href="../index.php"> SGF - Sistema Gerenciador de Farmácia</a>';
        echo '<ul class="nav">';
        echo '<li class="active"><a href="../view/inicioSGF.php">Início</a></li>';
        echo '<li><a href="../view/consultarCliente.php">Clientes</a></li>';
        echo '<li><a href="../view/consultarProduto.php">Produtos</a></li>';
        echo '<li><a href="../view/consultarCategoria.php">Categoria</a></li>';
        echo '<li><a href="../view/consultarFornecedor.php">Fornecedor</a></li>';
        echo '<li><a href="../view/consultarPedido.php">Pedidos</a></li>';
        echo '<li><a href="../view/consultarVenda.php">Vendas</a></li>';
        echo '<li><a href="../view/consultarRelatorio.php">Relatórios</a></li>';
        echo '<li><a href="../index.php?acao=logout">Sair</a></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }

}
