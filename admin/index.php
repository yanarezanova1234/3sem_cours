<?php include 'foo.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
  </form>
    <div class="container">
      <div class="col-12">
        <a href="/courswork/authorization/exit.php" class="btn btn-danger mt-2" role="button">Выход</a>
        <button type="button" class="btn btn-success mt-2" data-toggle="modal" data-target="#create">+</button>
        <table class="table table-striped table-hover mt-2">
          <thead class="thead-dark">
            <th>Номер</th>
            <th>Услуга</th>
            <th>Талон</th>
          </thead>
          <tbody>
            <?php
              $mysql = new mysqli(
            'localhost',
            'root',
            'root',
            'db'
           );
           $q = "SELECT * FROM `users_1`";
           if (mysqli_query($mysql, $q)) {
            $res0 = mysqli_query($mysql, $q);
            $result = mysqli_fetch_all($res0, MYSQLI_ASSOC);
           } else {
               echo "Error: ".$q."<br>".mysqli_error($mysql);
           }
          ?>
            <?php foreach ($result as $res): ?>

            <tr>
              <td><?php echo $res['id']; ?></td>
              <td><?php echo $res['name']; ?></td>
              <td>
              <a href="id=<?php echo $res['id']; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $res['id']; ?>">+</a>
              <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res['id']; ?>">-</a>
              </td>
            </tr>
            <!-- Modal edit -->
            <div class="modal fade" id="edit<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменить учащиегося</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="read.php" method="post">
                      <div class="form-group">
                        <small>Имя</small>
                        <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>">
                      </div>
                      <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                    </button>
                    <button type="submit" class="btn btn-primary" name="Edit">Изменить</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal edit -->
            <!-- Modal delete -->
            <div class="modal fade" id="delete<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?php echo $res['id']; ?></h5>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <form action="/courswork/admin/delete.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $res['id'];?>">
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                 </button>
                 <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                 </form>
               </div>
             </div>
           </div>
         </div>
            <!-- Modal delete -->
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>

<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" >
          <div class="form-group">
            <input type="text" class="form-control" name="name" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal create -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
