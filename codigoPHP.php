
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
          $i = 0;
          foreach($data as $alumno){
            echo '<tr>';
            echo '<td>'.$i++.'</td>';
            echo '<td>'.$alumno[0].'</td>';
            echo '<td>'.$alumno[1].'</td>';
            echo '</tr>';
          }
        }

        function alumnos_no_matriculados($alumnos_anterior, $alumnos_actual) {
          return array_udiff($alumnos_anterior, $alumnos_actual, 'cmp_codigo');
        }
        function alumnos_sin_tutor($alumnos_anterior, $alumnos_actual) {
          return array_udiff($alumnos_actual, $alumnos_anterior, 'cmp_codigo');
        }

        function ejecutar1()
        {
          $data1 = cargar_doc1();
          $data2 = cargar_doc2(); 
          
          usort($data1, "cmp_codigo");
          mostrar(alumnos_no_matriculados($data1, $data2));
        }
        function ejecutar2()
        {
          $data1 = cargar_doc1();
          $data2 = cargar_doc2();          
          
          usort($data2, "cmp_codigo");
          mostrar(alumnos_sin_tutor($data1, $data2));
        }        
      ?>
   </body>
</html>