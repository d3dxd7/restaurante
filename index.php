<?php

$mysqli = mysqli_connect("localhost", "root", "", "restaurante");

?>
<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="container">

      <div class="row barra-verde">
        <div class="col-md-11 text-center">
          Compras acima de R$ 100,00 o frete é grátis!
        </div>
        <div class="col-md-1 text-end">
          <img src="img/x.svg" class="fecha-barra-verde">
        </div>
      </div>
      <div class="header">
        <div class="coluna1">
          <img src="img/logo.svg">
        </div>
        <div>
          <ul class="menu">
            <li>
              <a>
                Home
              </a>
            </li>
            <li>
              <a>
                Quem Somos
              </a>
            </li>
            <li class="down">
              <a>
                Serviços
              </a>
              <ul>
                <li>
                  <a>
                    Serviço A
                  </a>
                </li>
                <li>
                  <a>
                    Serviço B
                  </a>
                </li>
                <li>
                  <a>
                    Serviço C
                  </a>
                </li>
              </ul>
            </li>
            <li class="down">
              <a>
                Produtos
              </a>
              <ul>
                <li>
                  <a>
                    Produto A
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a>
                Contato
              </a>
            </li>
          </ul>
        </div>
        <div class="coluna3">
          <a href="">
           <img src="img/search.svg">
         </a>
         <a href="">
           <img src="img/profile.png">
         </a>
         <a href="">
           <img src="img/cart.svg">
         </a>
       </div>
     </div>
     <div class="banner">
      <h2>
        Promoção do dia!
      </h2>
      <h3>
        Compre 10 marmitas e ganhe uma!
      </h3>
      <a href="" class="botao-laranja">
        Saiba mais
      </a>
    </div>

    <?php
    
    $query = "SELECT * FROM produtos ORDER by id";
    
    $result = mysqli_query($mysqli, $query);
    
    ?>
    
    <div class="produtos">
      <h2>
        Produto<span>s</span>
      </h2>
      <div class="row">

        <?php while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){ ?>

          <div class="col-md-3">
            <div class="produto-thumb">
              <div class="imagem" style="background-image:url(img/<?php echo $row['imagem'] ?>);" ></div>
              <?php echo $row['nome'] ?>
              <div style= "background-color:#fff">
                <?php echo number_format($row['preco'],2,',','.') ?>
              </div>
            </div>
          </div>

        <?php } ?>
        
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>