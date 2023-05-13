<?php

// Instanciar a Classe Zip
$zip = new ZipArchive();

// Criar o caminho dos arquivos
$diretorio_arquivos = 'arquivos/';

// Criar o nome do arquivo ZIP
$nome_arquivo_zip = md5(time()) . '.zip';

// Criar o caminho do arquivo ZIP
$caminho_arquivo_zip = 'arquivos_zip/' . $nome_arquivo_zip;

// Criar o arquivo e verificar se ocorreu tudo certo
if($zip->open($caminho_arquivo_zip, \ZipArchive::CREATE)){

    // Adicionar os arquivos no arquivo zip
    // Caminho do arquivo original
    // Novo nome do arquivo
    $zip->addFile($diretorio_arquivos . "arquivo_um.txt", "arquivo_um.txt");
    $zip->addFile($diretorio_arquivos . "arquivo_dois.txt", "arquivo_dois.txt");

    // Fechar o arquivo zip após inserir os arquivos
    $zip->close();

    echo "<p style='color: green;'>Arquivo criado com sucesso.</p>";
}

// Verificar se o arquivo zip foi criado
if(file_exists($caminho_arquivo_zip)){

    // Forçar o donwload do arquivo
    header("Content-Type: application/zip");
    // Atribuir o nome do arquivo 
    // Content-Disposition = Disposição de conteúdo / attachment = anexo
    header("Content-Disposition: attachment;filename=$nome_arquivo_zip");
    // Gera o arquivo
    readfile($caminho_arquivo_zip);

    // Remover o arquivo zip após download
    //unlink($caminho_arquivo_zip);
}