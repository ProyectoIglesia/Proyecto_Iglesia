<?php 
       if (isset($_POST['cargar_grafica'])) {
        $codigo_nivel = $_POST['codigo_nivel'];
        $sql_nivel = "SELECT * FROM nivel WHERE cod_nivel='".$codigo_nivel."'";
        $consulta_nivel = mysqli_query($enlace, $sql_nivel);
        $nivel = mysqli_fetch_assoc($consulta_nivel);
        if($nivel['trimestre'] == "trimestre_1"){
            $trimestre = 1;
        }
        elseif($nivel['trimestre'] == "trimestre_2"){
            $trimestre = 2;
        }
        else{
            $trimestre = 3;
        }
        if($nivel['horario'] == "horario 1"){
            $horario = 1;
        }
        else{
            $horario = 2;
        }

            for ($i=0; $i < 10; $i++) { 
                $imprime[$i] = 0;
                $imprime2[$i] = 0;
            }   
                $sql_cantidad_estudiantes = "SELECT * FROM nivel WHERE cod_nivel='".$codigo_nivel."'";
                $consulta_cantidad_estudiantes = mysqli_query($enlace, $sql_cantidad_estudiantes);
                $cantidad_estudiantes = mysqli_fetch_assoc($consulta_cantidad_estudiantes);
                $sql_grafica_nota = "SELECT * FROM notas_evaluaciones WHERE cod_nivel='".$codigo_nivel."' and asignatura='modulo_1'";
                $consulta_grafica_nota = mysqli_query($enlace, $sql_grafica_nota);
                while ($notas=mysqli_fetch_assoc($consulta_grafica_nota)) {
                    for ($i = 1 ; $i <= 10 ; $i++) {
                        if($notas['evaluacion'] == "evaluacion_$i"){
                            $imprime[$i - 1] += $notas['nota'] / $cantidad_estudiantes['cantidad_estudiantes'];
                            $i += 10;
                        }
                        else{
                            $imprime[$i - 1] += 0;
                        }
                    }
                }
                $sql_grafica_nota2 = "SELECT * FROM notas_evaluaciones WHERE cod_nivel='".$codigo_nivel."' and asignatura='modulo_2'";
                $consulta_grafica_nota2 = mysqli_query($enlace, $sql_grafica_nota2);
                while ($notas=mysqli_fetch_assoc($consulta_grafica_nota2)) {
                    for ($i = 1 ; $i <= 10 ; $i++) {
                        if($notas['evaluacion'] == "evaluacion_$i"){
                            $imprime2[$i - 1] += $notas['nota'] / $cantidad_estudiantes['cantidad_estudiantes'];
                            $i += 10;
                        }
                        else{
                            $imprime2[$i - 1] += 0;
                        }
                    }
                }    
                for ($i=1; $i <= 10; $i++) { 
                    $sql_grafica_final = "UPDATE grafica SET prueba_".$i." = '".$imprime[$i - 1]."' WHERE materia='materia_1'";
                    mysqli_query($enlace, $sql_grafica_final);
                
                }
                for ($i=1; $i <= 10; $i++) { 
                    $sql_grafica_final = "UPDATE grafica set prueba_".$i." = '".$imprime2[$i - 1]."' WHERE materia='materia_2'";
                    $consulta_grafica_final = mysqli_query($enlace, $sql_grafica_final);
                }
                $sql_imprime_grafica1 = "SELECT * FROM grafica WHERE materia='materia_1'";
                $consulta_imprime_grafica1 = mysqli_query($enlace, $sql_imprime_grafica1);
                $grafica_final_1 = mysqli_fetch_assoc($consulta_imprime_grafica1);
                $sql_imprime_grafica2 = "SELECT * FROM grafica WHERE materia='materia_2'";
                $consulta_imprime_grafica2 = mysqli_query($enlace, $sql_imprime_grafica2);
                $grafica_final_2 = mysqli_fetch_assoc($consulta_imprime_grafica2);       
}
        ?>