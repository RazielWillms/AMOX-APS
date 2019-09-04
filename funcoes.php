<?php
function form()
{
    ?>
    <form method="post" action="página.php">
        //Info´s do formulário
        XXXX: <input type="text" name="likeid"/><br>

        //button\action
        <input type="submit" name="action" value="Cadastrar"/>
        <input type="reset" value="Limpar"><br>
    </form>
    <?php
}

function consultarBD($pdo, $atualizarID = null)
{
    if (is_null($atualizarID)) {
        $consulta = $pdo->query('SELECT * FROM Tabela');
    } else {
        $consulta = $pdo->query("SELECT * FROM Tabela WHERE whatyouwanttosearch = $atualizarID;");
    }

    $ClienteArray = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $ClienteArray;
}

function listarCliente($pdoconexcao)
{
    $ClienteArray = consultarClientes($pdoconexcao);
    if (!empty($ClienteArray)) {
        $id = $ClienteArray[0]['id_cliente'];
        $nomeCliente = $ClienteArray[0]['nome_cliente'];
        $cpf = $ClienteArray[0]['cpf'];
        $email = $ClienteArray[0]['email'];
        $telefone = $ClienteArray[0]['telefone'];
        ?>
        <?php
        echo 'Nome' . '- ' . 'cpf' . ' - ' . 'email' . ' - ' . 'telefone' . '<br>';
        foreach ($ClienteArray as $ClienteDados) {
            echo '<a href="cadastroCliente.php?deletarID='
                . $ClienteDados['id_cliente'] . '">Deletar</a> '
                . '<a href="cadastroCliente.php?atualizarID='
                . $ClienteDados['id_cliente'] . '">Atualizar</a> '
                . '<a href="endereco.php?atualizarID='
                . $ClienteDados['id_cliente'] . '">Complementar</a> '
                . $ClienteDados['nome_cliente'] . '-'
                . $ClienteDados['cpf'] . '-'
                . $ClienteDados['email'] . '-'
                . $ClienteDados['telefone'] . '<br>' . PHP_EOL;
        }
        ?>
        <?php
    } else {
        echo "Sem Cadastros!!";
    }
}

function listarsobre()
{
    ?>
    <form method="post" action="menu.php">
        Estado: Rio Grande do Sul<br>
        Cidade: Santo Ângelo<br>
        Horário: 23:30<br>
        Dia: 23/11<br>
        Local: Fenamilho<br>
        <imagem>
            <img src="img/palco.jpg" ;><br>
        </imagem>
    </form>
    <?php
}

?>
