<?php

include('config.php');

session_start();

if(isset($_SESSION['email'])){

    header("Location:{$back_url}/dashboard.php");

}

?>

<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $application_name ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php if(isset($_GET['alerta']) && $_GET['alerta'] == 'success'){ ?>

                        <div class="alert alert-success">
                            <?= $_GET['mensagem'] ?>
                        </div>

                    <?php } ?>

                    <?php if(isset($_GET['alerta']) && $_GET['alerta'] == 'danger'){ ?>

                        <div class="alert alert-danger">
                            <?= $_GET['mensagem'] ?>
                        </div>

                    <?php } ?>
                    <h2>
                        Login
                    </h2>
                    <br>
                    <form method="post" action= "login.php">
                        <div>
                            <input type="text" placeholder="E-mail" class="form-control" name="email">
                        </div>
                        <br>
                        <div>
                            <input type="password" placeholder="Senha" class="form-control" name="senha">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

    </html>