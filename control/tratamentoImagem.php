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


            if($img && imagefilter($img,IMG_FILTER_GRAYSCALE))
            {
                echo 'Conversão escala de cinza!<br/>';
                imagepng($img, $uploaddir."1_".$nomeImagem."_EscalaCinza_".$extensao);
            }
            else
            {
                echo 'Conversão falhou!!!';
            }

            $width = imagesx($img);
            $height = imagesy($img);
            $maiorCor = 0;
            $menorCor = 255;

            for ($i=0; $i < $width; $i++ ){
                for ($j=0; $j < $height; $j++ ) {

                    $corAtual = imagecolorat($img, $i, $j);

                    if ($corAtual > $maiorCor){
                        $maiorCor = $corAtual;
                    }
                    if ($corAtual < $menorCor){
                        $menorCor = $corAtual;
                    }
                }
            }

            for ($i=0; $i < $width; $i++ ){
                for ($j=0; $j < $height; $j++ ) {
                    $corDoPixel = imagecolorat($img, $i, $j);

                    $novaCor = round((($corDoPixel-$menorCor)/($maiorCor-$menorCor))*(256-1));
                    imagesetpixel($img, $i, $j, $novaCor);
                }
            }

            imagepng($img, $uploaddir."2_".$nomeImagem."_Equalizada_".$extensao);
            echo "Equalização <br/>";


            for ($i=0; $i < $width; $i++ ){
                for ($j=0; $j < $height; $j++ ) {
                    $color = imagecolorat($img, $i, $j);
                    if ($color >= 120){
                        imagesetpixel($img, $i, $j, 0);
                    }else{
                        if ($color <= 120){
                            imagesetpixel($img, $i, $j, 255);
                        }
                    }
                }
            }
            imagepng($img, $uploaddir."3_".$nomeImagem."_Binarizada_".$extensao);
            echo "Binarização concluida <br/>";

            if($img && imagefilter($img,IMG_FILTER_EDGEDETECT ))
            {
                echo 'Detecção de borda completa!<br/>';

                imagepng($img, $uploaddir."4_".$nomeImagem."_Detecção de borda_".$extensao);

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