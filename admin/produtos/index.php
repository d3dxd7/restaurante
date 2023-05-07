<?php

include('../config.php');

session_start();

if (!isset($_SESSION['email'])) {

  header("Location: {$back_url}");

}

$mysqli = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

$sql_produtos = "SELECT a.*, b.nome categoria_nome FROM produtos a, categorias b WHERE a.categoria_id = b.id ORDER BY a.id asc";

$query_produtos = mysqli_query($mysqli, $sql_produtos);

?>

<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $application_name ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
    .table td {
      vertical-align: middle;
    }
  </style>
</head>

<body>

  <?php include('../menu.php'); ?>

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= $back_url; ?>">
            Admin
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= $back_url . '/produtos'; ?>">
            Produtos
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Listagem
        </li>
      </ol>
    </nav>
  </div>

  <div class="container">

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

    <table class="table">
      <tr>
        <td colspan="4"></td>
        <td class="text-end">
          <a href="<?= $back_url . '/produtos/novo.php' ?>" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Novo">
            <i class="fa-solid fa-circle-plus"></i>
          </a>
        </td>
      </tr>
      <tr>
        <th>
          Id
        </th>
        <th>
          Nome
        </th>
        <th>
          Preço
        </th>
        <th>
          Categoria
        </th>
        <th class="text-end">
          Ações
        </th>
      </tr>

      <?php while ($row = mysqli_fetch_array($query_produtos, MYSQLI_BOTH)) { ?>

        <tr>
          <td>
            <?= $row['id']; ?>
          </td>
          <td>
            <?= $row['nome']; ?>
          </td>
          <td>
            <?= $row['preco']; ?>
          </td>
          <td>
            <?= $row['categoria_nome'] ?>
          </td>
          <td class="text-end">
            <a href="<?= $back_url . '/produtos/editar.php?id=' . $row['id'] ?>" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="delete.php" method="post" style="display: inline-block;">
              <input type="hidden" value="<?= $row['id']; ?>" name="id">
              <button type="submit" onclick="return confirm('Tem certeza que quer apagar o registro <?= $row['id']; ?>?')" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Excluir">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>

      <?php } ?>

    </table>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script type="text/javascript">
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>
</body>

</html>