<?php 	
	include 'codigoPHP.php';     
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Tutorías UNSAAC</title>
    <link rel="stylesheet" type='text/css' href='styles.css'/>
  </head>
  <body>
    <div class="container">
      <div class="container containerTexts">
        <div class="container containerTexts text1"></div>
        <div class="container containerTexts text2"></div>
      </div>      
      <div class="container containerButtons">
      <form name="Cargar Alumnos Antiguos">
        <button class="button" onclick=cargar1() >Cargar Alumnos Antiguos.csv</button>
      </form>
        <br />
      <form name="Cargar Alumnos Matriculados2022-I">
        <button class="button" onclick=cargar2()>Cargar Alumnos Matriculados2022-I.csv</button>
      </form>
      </div>
    </div>
    <br />
    <form name="form" id="idform" method="post" action="index.php">
    <div class="container2">
    
      <div class="container2 select1">      
        <button class="container2 buttonRadio" type="radio" value="No tutorados" name="operacion"></button>
        <h4>Mostrar alumnos que no serán tutorados en 2022-I</h4>
      </div>
      <div class="container2 select2">
        <input class="container2 buttonRadio" type="radio" value="Nuevos" name="operacion" checked>
        <h4>Mostrar nuevos alumnos para tutoría</h4>
      </div>
      
      </form>
      
    </div>
    <script type="text/javascript">
      function verradiovalue($opcion){
        var radiovalue=document.form.operacion.value;
        if(radiovalue.length==0) radiovalue="ninguno";
        $opcion=radiovalue;
        alert("Valor seleccionado: " + radiovalue+":"+$opcion);
      }
    </script>
    <div class="container3">
      <div class="container3 containerResults">
        <table class="table" >
          <thead class="table-success table-striped" >                       
            <tr>
              <th>Nro</th> 
              <th>Codigo</th>                                        
              <th>Apellidos y Nombres</th>

            </tr>
            </thead>

            <tbody>
              <?php             
                ejecutar2();   
              ?>
            </tbody>
          </table>
      </div>
    </div>
  </body>
</html>