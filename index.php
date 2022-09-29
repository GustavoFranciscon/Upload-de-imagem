
<?php



if(isset($_POST['acao'])){
   $arquivo = $_FILES['file'];

   $arquivonovo = explode ('.',$arquivo['name']);

   /* Array com formatos de imagem aceitos */
   $formatos = array('jpg', 'png', 'webp', 'jpeg');

   /* Condição para permitir ou negar upload */
   if(!in_array(strval($arquivonovo[sizeof($arquivonovo)-1]), $formatos)){
     echo "<script>alert('Você não pode realizar upload deste tipo de arquivo');</script>";
   }else{
     echo "<script>alert('Enviado com sucesso!');</script>";
       move_uploaded_file($arquivo['tmp_name'], './imagem/imagem-upload.png');
   }
} 


?>
<!-- Importação de Jquery necessaria para o funcionamento do preview da imagem de upload -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style_upload.css">
   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   <!-- Box Icons -->
   <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <title>Upload de imagem</title>
</head>
<body>
   

<div class="logo"><img  src="logo.png" alt="Logo FM Sistemas de Impressão"></div>

 <h1 class="titulo">Upload de imagem</h1>

 <!-- Formulário de upload de imagem -->
   <div class="up">
     <form action="" method="POST" enctype="multipart/form-data">
         <div class="preview"><img id="imagem" src="./placeholder.png" style= "height: 150px; border-radius: 5px;"></div>
         <br>
         <label class="lbl-file" for="file">Selecionar arquivo&nbsp;<i class='bx bx-search-alt-2'></i></label>
         <input class="btn" type="file" name="file" id="file" onchange="previewImagem()" />

         <label class="lbl-acao" for="acao">Enviar arquivo &nbsp;<i class='bx bxs-cloud-upload'></i></label>
         <input class="btn" type="submit" name="acao" id="acao" value="Enviar" />
     </form>
   </div>

   <!-- Preview de upload utilizando Jquery -->
   <script>
       function previewImagem() {
         var imagem = document.querySelector('input[name=file]').files[0];
         var preview = document.querySelector('#imagem');
         var reader = new FileReader();
         reader.onloadend = function () {
           preview.src = reader.result;
         }

         if (imagem){
           reader.readAsDataURL(imagem);
         }else{
           preview.src = "./placeholder.png";
         }
       }
   </script>

</body>
</html>