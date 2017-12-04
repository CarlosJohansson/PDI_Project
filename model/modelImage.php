<?php

class modelImage{

    private $nomeImagem;
    private $descricaoImagem;
    private $caminho;
    private $nomeArquivo;


    /**
     * modelImage constructor.
     * @param $nomeImagem
     * @param $descricaoImagem
     * @param $caminho
     * @param $nomeArquivo
     */
    public function __construct($nomeImagem, $descricaoImagem, $caminho, $nomeArquivo)
    {
        $this->nomeImagem = $nomeImagem;
        $this->descricaoImagem = $descricaoImagem;
        $this->caminho = $caminho;
        $this->nomeArquivo = $nomeArquivo;
    }

    public function getNomeImagem()
    {
        return $this->nomeImagem;
    }

    public function setNomeImagem($nomeImagem)
    {
        $this->nomeImagem = $nomeImagem;
    }

    public function getDescricaoImagem()
    {
        return $this->descricaoImagem;
    }

    public function setDescricaoImagem($descricaoImagem)
    {
        $this->descricaoImagem = $descricaoImagem;
    }

    public function getCaminho()
    {
        return $this->caminho;
    }

    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;
    }

    public function getNomeArquivo()
    {
        return $this->nomeArquivo;
    }

    public function setNomeArquivo($nomeArquivo)
    {
        $this->nomeArquivo = $nomeArquivo;
    }
}

?>

