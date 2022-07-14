
<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>
   <body>
       <!--Aquí debe de ser insertado el código php-->
      <?php
        function cmp_codigo ($alumno1, $alumno2) {          
          return $alumno1[0] == $alumno2[0] ? 0 : ( $alumno1[0] > $alumno2[0] ? 1 : -1 );
        }
        function cmp_nombre ($alumno1, $alumno2) {          
          return $alumno1[1] == $alumno2[1] ? 0 : ( $alumno1[1] > $alumno2[1] ? 1 : -1 );
        }
        function _cmp_codigo ($alumno1, $alumno2) {          
          return $alumno1[0] === $alumno2[0] ? 0:-1;
        }
        function startsWith ($string, $startString){
          $len = strlen($startString);
          return (substr($string, 0, $len) === $startString);
        }        
        function cargar_doc1 () {
          $ruta = 'data/Tutorias 2021-2.csv';
          $data = [];
          $file = fopen($ruta, 'r');
          $i = 5;
          $idx = 0;
          while (($line = fgetcsv($file)) !== FALSE) {
            if($i-- >= 0) continue;
            if( $line[0] === '' || $line[0] === 'CODIGO' || startsWith($line[0],'Docente') || (startsWith($line[0], '22') && strlen($line[0] == 6) )) continue;
            if($line[5]!==''){
              $data[$idx++] = [$line[0], $line[1]];
            }
          }
          fclose($file);
          return $data;
        }        
        function cargar_doc2 () {
          $ruta = 'data/Tutorias 2022-1.csv';
          $data = [];
          $file = fopen($ruta, 'r');
          $i = 1; $idx=0;
          while (($line = fgetcsv($file)) !== FALSE) {
            if($i-- > 0) continue;
            $data[$idx++] = array_slice($line, 1, 2);
          }
          fclose($file);          
          return $data;
        }
        function mostrar($data) {
          for ($i = 0; $i < count($data); $i++) {
            echo '<pre>';
            echo $i.' ('.$data[$i][0].' | '.$data[$i][1].')<br>'; 
            echo '</pre>';
          }
        }
        function diferenciaFast($data1, $data2) {
          $exist = [];

          for($i = 0; $i < count($data2); $i++){
            $idx = (integer)($data2[$i][0]);
            $exist[$idx] = 1;
          }
          /*
          for ($i = 0, $cont=0; $i < count($data1); $i++){
            $idx = (integer)($data1[$i][0]);
            if( array_key_exists($idx, $exist) === FALSE){
              echo '<pre>';
              echo $cont++.' ('.$data1[$i][0].'  '.$data1[$i][1].')<br>'; 
              echo '</pre>';
            }
            
          }
          */
          ?>

          <?php
            for ($i = 0, $cont=0; $i < count($data1); $i++){
          ?>
            <?php
            $idx = (integer)($data1[$i][0]);
            if( array_key_exists($idx, $exist) === FALSE){
            ?>
              <tr>
                <th><?php  echo ++$cont?></th>
                <th><?php  echo $data1[$i][0]?></th>                                                
                <th><?php  echo $data1[$i][1]?></th>
              </tr>
            <?php  
            }
            ?>  
          <?php 
          }
          ?>
        <?php  
        }

        function alumnos_no_matriculados($alumnos_anterior, $alumnos_actual) {
          diferenciaFast($alumnos_anterior, $alumnos_actual);
        }
        function alumnos_sin_tutor($alumnos_anterior, $alumnos_actual) {
          diferenciaFast($alumnos_actual, $alumnos_anterior);
        }
        function cargar1()
        {
          $data1=cargar_doc1();
        }
        function cargar2()
        {
          $data2=cargar_doc2();
        }

        function ejecutar1()
        {
          $data1 = cargar_doc1();
          $data2 = cargar_doc2(); 
          
          usort($data1, "cmp_codigo");

          alumnos_no_matriculados($data1, $data2);
        }
        function ejecutar2()
        {
          $data1 = cargar_doc1();
          $data2 = cargar_doc2();          
          
          usort($data2, "cmp_codigo");       
                    
          alumnos_sin_tutor($data1, $data2);
        }
        
        
      ?>
   </body>
</html>