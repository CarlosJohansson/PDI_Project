<?php
tratamentoImagem();

function tratamentoImagem(){

    $nomeImagem = $_POST['nomeImagem'];
    $tipoImagem = $_POST['dropTipoImg'];


    //Caminho absoluto
    $uploaddir = $_SERVER['DOCUMENT_ROOT']."/PDI_Project/img/";
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

                default:
                    exit;
                    break;
            }

            $width = imagesx($img);
            $height = imagesy($img);

            for ($i=0; $i < $width; $i++ ){
                for ($j=0; $j < $height; $j++ ) {

                    $color = imagecolorat($img, $i, $j);
                    echo $color; exit;
                    if ($color >= 120){
                        imagesetpixel($img, $i, $j, 0);
                    }else{
                        imagesetpixel($img, $i, $j, 1);
                    }
                }
            }
            imagepng($img, $uploaddir.$nomeImagem."binarizada".$extensao);

            if($img && imagefilter($img,IMG_FILTER_EDGEDETECT))
            {
                echo 'Detecção de borda completa!';

                imagepng($img, $uploaddir.$nomeImagem.$extensao);



//                if ($img && imagefilter($img, IMG_FILTER_EDGEDETECT)){
//                }
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