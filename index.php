<?php 	
	include 'codigoPHP.php';     
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Tutorías UNSAAC</title>
  </head>
  <style>
    .container {
      display: flex;
      padding: 15px 32px;
    }
    .containerTexts {
      width: 50%;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      border-radius: 10px;
    }
    .text1 {
      box-shadow: -5px 5px 5px #98afa9;
      border: 1px solid #008cba;
      width: 70%;
      height: 50%;
      margin-bottom: 20px;
    }
    .text2 {
      box-shadow: -5px 5px 5px #98afa9;
      border: 1px solid #008cba;
      width: 70%;
      height: 50%;
    }
    .containerButtons {
      width: 50%;
      display: flex;
      flex-direction: column;
    }
    .button {
      border: none;
      color: white;
      padding: 10px 32px;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      background-color: #008cba;
      border-radius: 10px;
      box-shadow: -5px 5px 5px #98afa9;
      width: 400px;
    }
    .button:hover {
      background-color: #00ba8b;
    }
    .button:active {
      background-color: #252d97;
    }
    .width {
      width: fit-content;
      height: fit-content;
    }

    .container2 {
      width: 100%;
      height: 150px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .select1 {
      width: 50%;
      display: flex;
      flex-direction: row;
      height: 30%;
    }
    .select2 {
      width: 50%;
      display: flex;
      flex-direction: row;
      height: 30%;
    }
    .select3 {
      width: 50%;
      display: flex;
      flex-direction: row;
      height: 30%;
    }
    .buttonRadio {
      width: 20px;
      height: 20px;
      border-radius: 20px;
      cursor: pointer;
      margin-right: 10px;
    }
    .buttonRadio:hover {
      background-color: #98afa9;
    }
    .buttonRadio:focus {
      background-color: #008cba;
    }
    h4:hover {
      color: #98afa9;
      cursor: pointer;
    }

    .container3 {
      display: flex;
      justify-content: center;
    }
    .containerResults {
      display: flex;
      border-radius: 10px;
      box-shadow: -5px 5px 5px #98afa9;
      border: 1px solid #008cba;
      width: 60%;
      height: fit-content;
      color: #98afa9;
      padding: 10px;
    }
  </style>
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
    <form name="form" id="idform" method="post" action="index2.php">
    <div class="container2">
    
      <div class="container2 select1">      
        <input class="container2 buttonRadio" type="radio" value="No tutorados" name="operacion" checked>
        <h4>Mostrar alumnos que no serán tutorados en 2022-I</h4>
      </div>
      <div class="container2 select2">
        <button class="container2 buttonRadio" type="radio" value="Nuevos" name="operacion"></button>
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
                ejecutar1();   
              ?>
            </tbody>
          </table>
      </div>
    </div>
  </body>
</html>