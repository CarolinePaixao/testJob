<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 13:17
 */

include_once "connect.php";
;?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Photo Post Rocket</title>
    <link rel="stylesheet" href="css/bootstrap-grid.css" >
    <link rel="stylesheet" href="css/bootstrap.css" >
</head>
<body>

    <div class="container-fluid" style="height: 100px; width: 100%;  background: black">
        <div class="row justify-content-md-center" style="padding-top: 20px;">
            <div class="col-5"><img class="" src="logo.png"/></div>
            <div class="col-3" style="color: white; font-weight: bolder; font-size: xx-large;">Photo Post Rocket</div>
        </div>
    </div>

    <div class="container" style="padding: 30px" >
        <div class="row">
            <div class="col-10"><h2>Mosaico de fotos</h2></div>
            <div class="col-1">
                <button type="button" class="btn btn-info" data-toggle="modal" id="btnModal" data-target="#formInclude">
                    Incluir Foto
                </button>
            </div>
        </div>
    </div>

    <div class="container" >
        <div class="row">
            <?php
            if($conn) {
                $select = $conn->prepare("SELECT * FROM photo");
                $select->execute();
                $photos = $select->fetchAll(PDO::FETCH_OBJ);
                if ($photos) {
                    foreach ($photos as $photo) {
                        echo "<div class='col-3'>
                                <img src='$photo->urlPhoto' title='$photo->namePhoto' width='100%' height='50%'/>
                               
                                <p>
                                    <h2>
                                        $photo->namePhoto
                                        <a class='del' data-id='$photo->idPhoto' href=''><img src='img/del.png' title='Excluir foto' align='right' width='5%' height='3%'/></a>
                                    </h2>
                                    $photo->descPhoto
                                    </p>
                              </div>";
                    }
                } else
                    echo "Nenhuma imagem foi inserida.";
            }else
                echo "Nenhuma imagem foi inserida.";
            ?>
        </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id="formInclude">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Incluir Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="save.php" method="POST" enctype="multipart/form-data" id="insertPhoto">
                <div class="modal-body">
                        <input name="acao" value="insert" type="hidden"/>
                        <p><label for="photo">Enviar foto</label> <input type="file" name="photo" required/></p>
                        <p><label for="namePhoto">Titulo da Foto</label> <input type="text" id="namePhoto" name="namePhoto" maxlength="40" required></p>
                        <p><label for="descPhoto">Descrição</label> <textarea rows="3" id="descPhoto" name="descPhoto" maxlength="255" required></textarea></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Incluir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js" type="application/javascript"></script>
    <script src="js/bootstrap.bundle.js" type="application/javascript"></script>
<script type="application/javascript">
    $(function(){
        $('#btnModal').click(function () {
             $('#formInclude').modal('show');
            }
        );

        $('.del').click(function () {
            a = confirm("Deseja apagar a imagem?");
            if(a){
                id = $(this).attr('data-id');
                $.ajax({
                    url: 'save.php',
                    type: 'post',
                    data: 'acao=del&id='+id,
                    success: function (retorno) {
                        if(retorno)
                            location.reload();
                        else
                            alert('Não foi possível excluir a foto.');
                    }
                });
            }

            return false;
        });

    });

</script>
</body>
</html>
