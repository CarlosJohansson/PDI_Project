<?php
/**
 * Created by PhpStorm.
 * User: Johansson
 * Date: 03/12/2017
 * Time: 17:06
 */


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Projeto PDI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.css">\
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
        <form enctype="multipart/form-data" action="../control/tratamentoImagem.php" method="post">
            <fieldset>
                <legend>Insira sua imagem</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome da imagem</label>
                            <input class="form-control" id="nomeImagem" name="nomeImagem"></input>
                        </div>
                        <div class="col-md-12">
                            <label>Selecione o tipo de imagem</label>
                            <select class="form-control dropdown-toggle" id="dropTipoImg" name="dropTipoImg">
                                <option>SELECIONE</option>
                                <option value="1">Jpeg</option>
                                <option value="2">Png</option>
                                <option value="3">DICOM</option>
                                <option value="4">BITMAP</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Insira sua imagem</label>
                            <input name="userfile" type="file"/>
                        </div>
                        <div class="col-md-12" style="padding-top: 30px; align-self: center;">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
            </fieldset>
        </form>
    </div>
    <div class="col-md-4">
    </div>
</div>
</body>
</html>