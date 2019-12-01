
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte MERS</title>
    
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
        <img src="..\public\img\MERS.png" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Redes Moviles de El Salvador - Reporte de Proyectos de Factibilidad en terminos de herramientas y Equipos </font></h1>
      
      
      <br><br><br><br>


    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
            <th class="Herramienta" bgcolor="#D0D3D4">Nombre de Proyecto</th>
            <th class="Herramienta" bgcolor="#D0D3D4">Herramienta/Equipo</th>
            <th class="Herramienta" bgcolor="#D0D3D4">Tipo de Herramienta</th>
            <th class="Herramienta" bgcolor="#D0D3D4">Marca</th>
            <th class="Herramienta" bgcolor="#D0D3D4">Disponibilidad</th>
            
          </tr>

        </thead>
        <tbody>

          <?php

use sisLog2\Proyecto;
?>

            @foreach ($anys as $any)
         <tbody>
          <tr>
         <?php
            $proyectoI=Proyecto::findOrFail($any->IDPROYECTO);
          ?>
          
            <td class="Herramienta"><div align="left">{{ $proyectoI->NOMBREPROYECTO }}</div></td>
            <td class="Herramienta"><div align="left">{{ $any->NOMBREHERRAMIENTA}} </div></td></td>
            <td class="Herramienta"><div align="left">{{ $any->TIPOHERRAMIENTA}} </div></td></td>
            <td class="Herramienta"><div align="left">{{ $any->MARCAHERRAMIENTA}} </div></td></td>
            <td class="Herramienta"><div align="left">{{ $any->CANTIDADHERRAMIENTA}}</div></td></td>
           
         </tbody>
        </tr>
          </tbody>      
  @endforeach



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


                       
                        
                        