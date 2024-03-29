<?php
  $id                = (int)$_GET['id'];
  $id_curso          = (int)$_GET['id_curso'];
  require_once('includes/load.php');
  $user              = $_SESSION['user_id'];
  $Evaluacion        = find_by_id('contenido_curso',$id);
  $cantidad_aciertos = muestra_aciertos($user,$id_curso,$id);
?>
<?php 
if(isset($_POST['regresar'])) {
      echo $id_curso;
      redirect('ConsultaCursoInfoDesarrollo.php?id='.$id_curso.'&objetivo=&video=&id_contenido=0&tema=', false);
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/jquery.bxslider.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="libs/js/jquery.bxslider.js"></script>
    <style>
        body{
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background: #ffffff;
        }.contenedor{
              width: 90%;
              margin: 0 auto;
        }.input-res{   
              width: 100%;
              max-width: 500px;
              box-sizing: border-box;
        }.boton_personalizado{
              text-decoration: none;
              padding: 10px;
              font-weight: 300;
              font-size: 12px;
              color: #ffffff;
              background-color: #19ABF7;
              border-radius: 6px;
              border: 2px solid #19ABF7;
        }header{
               width: 100%;
               height: 100px;
        }header h1{
                font-style: normal;
                font-family: Helvetica;
                font-size: x-large;
                color: #FFFFFF;
                padding: 2% 0;
                text-align: center;
                background:#023d86;
        }.main{
            width: 100%;
            background: #FFF;
            padding: 20px;
            float: left;
            box-sizing: border-box;
        }.main img{
             width: 20%;
             height: auto;
        }aside {
              width: 30%;
              padding: 20px;
              box-sizing: border-box;
        }footer{
            clear:both;
            float: left;
            margin-top: 20px;
            box-sizing: border-box;
            width: 100%;
            padding: 20px;
            color: #fff;
            background: #ffffff;
        }footer h3{
            font: normal;
            font-style: oblique;
            font-size: 18px;
            font-family: Helvetica;
        }footer textarea{
             font: normal;
             font-style: oblique;
             font-family: Helvetica;
             color: #0f0f0f;
             resize: none;
             width: 25%;
        }footer label{
             font: normal;
             font-style: oblique;
             font-family: Helvetica;
             color: #0f0f0f;
        }footer input{
            font: normal;
            font-family: Helvetica;
            color: #0f0f0f;
        }.comment-text-area {
            float: left;
            width: 100%;
            height: auto;
        }
        .textinput {
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 1px solid grey;
        }footer table{
            border: 1px;
            font: normal;
            font-style: italic;
            font-size: medium;
            font-family: 'Courier New', Courier, monospace;
            color: #7b868d;
        }footer td{
            border: 10px;
            }footer a{
                  }.ec-stars-wrapper {
                 /* Espacio entre los inline-block (los hijos, los `a`)
                    http://ksesocss.blogspot.com/2012/03/display-inline-block-y-sus-empeno-en.html */
                 font-size: 0;
                /* Podríamos quitarlo,
                   pero de esta manera (siempre que no le demos padding),
                   sólo aplicará la regla .ec-stars-wrapper:hover a cuando
                   también se esté haciendo hover a alguna estrella */
                display: inline-block;
               }@media screen and (max-width: 400px){
                  .contenedor{
                       width: 100%;
                   }aside{
                       display:none;
                   }
               }@media screen and (max-width: 800px){
                   .main{
                        width: 100%;
                    }
                   .main img{
                        width: 100%;
                        height: auto;
                }aside{
                     width: 100%;
                }
            }.ec-stars-wrapper a {
               text-decoration: none;
               display: inline-block;
               /* Volver a dar tamaño al texto */
               font-size: 32px;
               font-size: 2rem;

               color: #888;
            }.ec-stars-wrapper:hover a {
               color: rgb(39, 130, 228);
            }
            /*
             * El selector de hijo, es necesario para aumentar la especifidad
            */
            .ec-stars-wrapper > a:hover ~ a {
               color: #888;
            }
    </style>

</head>
<body>
    <div class="contenedor">
            <div><br><br></div>
            <div class="row">
              <div class="col-md-1">
                <form method="post"><button type="submit" name="regresar" class="btn btn-primary">Regresar</button></form>`
              </div>
            </div>`
            <form>
                <section class="main">
                    <header>
                           <h1><?php echo remove_junk(ucwords($Evaluacion['descripcion'])); ?></h1>
                    </header>
                    <?php  foreach ($cantidad_aciertos as $aciertos): 
                        $numero_aciertos = $aciertos['cantidad_aciertos'];
                        $cantidad_preguntas = $Evaluacion['cantidad_preguntas']; 
                        $puntaje = round(($numero_aciertos/$cantidad_preguntas)*10);
                        $mostrar = "<h3><font face=\"Century Gothic, Arial\" color=\"#20B641\" style=\"oblique\">  Usted culminó la evaluación con $numero_aciertos aciertos, de $cantidad_preguntas preguntas, su puntaje es $puntaje </font></h3>";
                        echo $mostrar;
                        
                    endforeach; ?>
                </seitalic
            </form>
            <footer>
            </footer>
    </div>

</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>