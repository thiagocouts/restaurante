<?php
    include('includes/header.php');

    $server = 'localhost';
    $user = 'thiago';
    $password = 'Couts#1987';
    $db_name = 'restaurante';
    $port = '3306';

    $prato = $_GET['prato'];

    $db_connect = new mysqli($server,$user,$password,$db_name,$port);
    mysqli_set_charset($db_connect,"utf8");

    if ($db_connect->connect_error) {
        echo 'Falha: ' . $db_connect->connect_error;
    } else {
        // echo 'Conexão feita com sucesso' . '<br><br>';
        $sql = "SELECT * FROM pratos WHERE codigo = '$prato'";
        $prato = $db_connect->query($sql);

        if($prato->num_rows > 0) {
            while($row = $prato->fetch_assoc()) {?>
                <div class="product-page small-11 large-12 columns no-padding small-centered">
                    <div class="global-page-container">

                        <div class="product-section">
                            <div class="product-info small-12 large-5 columns no-padding">
                                <h3><?=$row['nome']?></h3>
                                <h4><?=$row['categoria']?></h4>
                                <p><?=$row['descricao']?></p>

                                <h5><b>Preço: </b>R$ <?php echo number_format($row['preco'], 2, ',', '.') ?></h5>
                                <h5><b>Calorias: </b><?=$row['calorias']?></h5> 
                            </div>

                            <div class="product-picture small-12 large-7 columns no-padding">
                                <img src="img/cardapio/<?=$row['codigo']?>.jpg" alt="camarao">
                            </div>

                        </div>

                        <div class="go-back small-12 columns no-padding">
                            <a href="cardapio.php"><< Voltar ao Cardápio</a>
                        </div>

                    </div>
                </div>
        <?php
            }
        }else {?>
            <div class="product-page small-11 large-12 columns no-padding small-centered">
                <div class="global-page-container">

                    <div class="product-section">
                        <div class="product-info small-12 large-5 columns no-padding">
                            <h3><?="Prato não encontrado"?></h3>
                            <h4><?=$row['categoria']?></h4>
                            <p><?=$row['descricao']?></p>

                            <h5><b>Preço: </b>R$ <?php echo number_format($row['preco'], 2, ',', '.') ?></h5>
                            <h5><b>Calorias: </b><?=$row['calorias']?></h5> 
                        </div>

                    </div>

                    <div class="go-back small-12 columns no-padding">
                        <a href="cardapio.php"><< Voltar ao Cardápio</a>
                    </div>

                </div>
            </div>
        <?php
        }
    }
?>

<?php
    include('includes/footer.php');
?>