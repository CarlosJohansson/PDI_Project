<?php
tratamentoImagem();

function tratamentoImagem(){

    $nomeImagem = $_POST['nomeImagem'];
    $tipoImagem = $_POST['dropTipoImg'];


    //Caminho absoluto
    $uploaddir = $_SERVER['DOCUMENT_ROOT']."/I_Project/img/";
    //Nome que veio
    $nome = basename($_FILES['userfile']['name']);
    //Caminho+nome
    $uploadfile = $uploaddir . basename(date("YmdHis").".jpg");

    if (!file_exists($_FILES['userfile']['tmp_name']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        echo "Erro ao fazer upload de imagem";
    } else {
        

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){

            $path = $uploadfile;
            switch ($tipoImagem){

                case 1:
                    $img = imagecreatefromjpeg($path);
                    $extensao = ".jpg";
                    break;
                case 2:
                    $img = imagecreatefrompng($path);
                    $extensao = ".png";
                    break;
                case 3:
                    $img = imagecreatefromjpeg($path);
                    $extensao = ".jpg";
                    break;
                case 4:
                    $img = imagecreatefrombmp($path);
                    $extensao = ".bmp";
                    break;

            }
            if($img && imagefilter($img, IMG_FILTER_EDGEDETECT))
            {
                echo 'Imagem convertida para grayscale';

                imagepng($img, $uploaddir.$nomeImagem.$extensao);
            }
            else
            {
                echo 'Conversão falhou!!!';
            }

            imagedestroy($img);
        }
    }
}
?>