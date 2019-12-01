<?php

    $conexion=mysqli_connect('localhost','root','','bdsigmers');

    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte de Cita</title>
    
    <style type="text/css">

      hr {
          border-color: #66BDA9;
          height: 1px;
          margin: 5px 0;
          display: block;
          clear: both;
      }

      table {
            border: #CC5A6A 1px solid;

      }

      th,tr,td{
            border: #66BDA9 1px solid;
      }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="..\public\img\Mers.png" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Redes Moviles de El Salvador - Reporte de Bitacora de Usuarios</font></h1>
      
    <br><br>
    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
            <th class="nombre del paciente" bgcolor="#D0D3D4">Descripcion Incidencia</th>
            <th class="fecha de la cita" bgcolor="#D0D3D4">Fecha </th>
            <th class="fecha de la cita" bgcolor="#D0D3D4">Hora</th>
            
          </tr>

        </thead>
        <tbody>

          <?php 
          $sql="SELECT * from bitacora";
          $result=mysqli_query($conexion,$sql);

          while($mostrar=mysqli_fetch_array($result)){
              ?>

          <tr>
            <td class="nombre del paciente"><div align="left"><?php echo $mostrar ['DESCRIPCIONBITACORA']?></div></td>
            <td class="nombre del paciente"><div align="left"><?php echo $mostrar ['FECHABITACORA']?></div></td>
            <td class="nombre del paciente"><div align="left"><?php echo $mostrar ['HORABITACORA']?></div></td>
          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
      
    </main>
    <footer>
      <br><br>
      <hr>
      <br>
      <center>Reporte de Apoyo para los Usuarios Administradores de la Empresa MERS</center>
    </footer>
  </body>
</html>