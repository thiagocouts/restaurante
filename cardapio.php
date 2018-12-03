<?php
    include('includes/header.php');
?>
           
<div class="cardapio-list small-11 large-12 columns no-padding small-centered">
    
    <div class="global-page-container">
        <div class="cardapio-title small-12 columns no-padding">
            <h3>Cardapio</h3>
            <hr></hr>
        </div>

        <?php
            $server = 'localhost';
            $user = 'thiago';
            $password = 'Couts#1987';
            $db_name = 'restaurante';
            $port = '3306';

            $db_connect = new mysqli($server,$user,$password,$db_name,$port);
            mysqli_set_charset($db_connect,"utf8");

            if ($db_connect->connect_error) {
                echo 'Falha: ' . $db_connect->connect_error;
            } else {
                // echo 'Conexão feita com sucesso' . '<br><br>';
                $sql = "SELECT DISTINCT categoria FROM pratos"; //distinct nao repete informacao
                $data = $db_connect->query($sql);

                if($data->num_rows > 0) {
                    while($row = $data->fetch_assoc()) {
                        $categoria = $row['categoria'];?>

                        <div class="category-slider small-12 columns no-padding">
                            <h4><?=$categoria?></h4>

                            <div class="slider-cardapio">
                                <div class="slider-002 small-12 small-centered columns">

                                    <?php
                                        $query = "SELECT * FROM pratos WHERE categoria = '$categoria'";
                                        $data2 = $db_connect->query($query);

                                        if($data2->num_rows > 0) {
                                            while($row2 = $data2->fetch_assoc()) {?>
                                                <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                                    <div class="cardapio-item">
                                                        <a href="prato.php?prato=<?=$row2['codigo']?>">
                                                            
                                                            <div class="item-image">
                                                                <img src="img/cardapio/<?=$row2['codigo']?>.jpg" alt="cogumelos"/>   
                                                            </div>

                                                            <div class="item-info">
                                                            
                                                                <div class="title"><?=$row2['nome']?></div>
                                                            </div>

                                                            <div class="gradient-filter">
                                                            </div>
                                                            
                                                        </a>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                    ?>
                                    <!-- <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                        <div class="cardapio-item">
                                            <a href="camarao-alho.html">
                                                
                                                <div class="item-image">
                                                    <img src="img/cardapio/jardim-cogumelos.jpg" alt="cogumelos"/>   
                                                </div>

                                                <div class="item-info">
                                                    
                                                
                                                    <div class="title">Jardim de cogumelos</div>
                                                </div>

                                                <div class="gradient-filter">
                                                </div>
                                                
                                            </a>
                                        </div>
                                    </div>

                                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                        <div class="cardapio-item">
                                            <a href="camarao-alho.html">
                                                
                                                <div class="item-image">
                                                    <img src="img/cardapio/camarao-alho.jpg" alt="camaroes"/>   
                                                </div>

                                                <div class="item-info">
                                                    
                                                
                                                    <div class="title">Camarões ao alho</div>
                                                </div>

                                                <div class="gradient-filter">
                                                </div>
                                                
                                            </a>
                                        </div>
                                    </div>

                                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                        <div class="cardapio-item">
                                            <a href="camarao-alho.html">
                                                
                                                <div class="item-image">
                                                    <img src="img/cardapio/salada-grega.jpg" alt="salada"/>   
                                                </div>

                                                <div class="item-info">
                                                    
                                                
                                                    <div class="title">Salada Grega</div>
                                                </div>

                                                <div class="gradient-filter">
                                                </div>
                                                
                                            </a>
                                        </div>
                                    </div>

                                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                        <div class="cardapio-item">
                                            <a href="camarao-alho.html">
                                                
                                                <div class="item-image">
                                                    <img src="img/cardapio/brie-geleia.jpg" alt="brie"/>
                                                </div>

                                                <div class="item-info">
                                                    
                                                
                                                    <div class="title">Tapas de quejo Brie e Geléia</div>
                                                </div>

                                                <div class="gradient-filter">
                                                </div>
                                                
                                            </a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                <?php      
                    }
                }else {
                    echo "Não há pratos!";
                }
            }
        ?>  

        <!-- <div class="category-slider small-12 columns no-padding">
            <h4>Entradas</h4>

            <div class="slider-cardapio">
                <div class="slider-002 small-12 small-centered columns">

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="camarao-alho.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/jardim-cogumelos.jpg" alt="cogumelos"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Jardim de cogumelos</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="camarao-alho.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/camarao-alho.jpg" alt="camaroes"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Camarões ao alho</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="camarao-alho.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/salada-grega.jpg" alt="salada"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Salada Grega</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="camarao-alho.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/brie-geleia.jpg" alt="brie"/>
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Tapas de quejo Brie e Geléia</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="category-slider small-12 columns no-padding">
            <h4>Pratos Principais</h4>

            <div class="slider-cardapio">
                <div class="slider-002 small-12 small-centered columns">

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="picanha-brasileira.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/picanha-brasileira.jpg" alt="picanha"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Picanha à Brasileira</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="picanha-brasileira.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/costelinha.jpg" alt="costela"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Costelinha de Porco</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="picanha-brasileira.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/salmao-legumes.jpg" alt="salmao"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Salmão aos Legumes</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="picanha-brasileira.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/churrasco-misto.jpg" alt="churrasco"/>
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Churrasco Misto</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    
                </div>
            </div>
            
        </div>

        <div class="category-slider small-12 columns no-padding">
            <h4>Sobremesas</h4>

            <div class="slider-cardapio">
                <div class="slider-002 small-12 small-centered columns">

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="cheesecake-cereja.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/cheesecake-cereja.jpg" alt="cheesecake"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Cheesecake de Cereja</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="cheesecake-cereja.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/flan-frutas-vermelhas.jpg" alt="flan"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Flan de Frutas Vermelhas</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="cheesecake-cereja.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/petit-gateau.jpg" alt="petit-gateau"/>   
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Petit Gateau</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                        <div class="cardapio-item">
                            <a href="cheesecake-cereja.html">
                                
                                <div class="item-image">
                                    <img src="img/cardapio/creme-papaya.jpg" alt="papaya"/>
                                </div>

                                <div class="item-info">
                                    
                                
                                    <div class="title">Creme de Papaya com Cassis</div>
                                </div>

                                <div class="gradient-filter">
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    
                </div>
            </div>
            
        </div> -->
    </div>
</div>

<?php
    include('includes/footer.php');
?>