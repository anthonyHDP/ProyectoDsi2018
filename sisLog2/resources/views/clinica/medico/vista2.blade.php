
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte Clinica Medica Genesis</title>
    
    <style type="text/css">

      hr {
          border-color: #66BDA9;
          height: 1px;
          margin: 5px 0;
          display: block;
          clear: both;
      }

      table {
            /*border: #CC5A6A 1px solid;*/

      }

      th,tr,td{
            /*border: #66BDA9 1px solid;*/
      }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="..\public\img\2695.png" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Clinica Medica Genesis - Reporte de Medicos</font></h1>
      <h4 align="center">Fecha Inicial: 02/10/2019</h4>
      <h4 align="center">Fecha Final: 29/11/2019</h4>
    
      
      
      <br><br><br><br>


    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
          
            <th class="Infactible" bgcolor="#D0D3D4">No.</th>
            <th class="Infactible" bgcolor="#D0D3D4">Nombre</th>
            <th class="Infactible" bgcolor="#D0D3D4">Especialidad</th>
            <th class="Infactible" bgcolor="#D0D3D4">Telefono</th>
            <th class="Infactible" bgcolor="#D0D3D4">Correo</th>
            <th class="Infactible" bgcolor="#D0D3D4">Direccion</th>
            
            
          </tr>

        </thead>
        <tbody>

          <?php

           use sisLog2\Medico;
          ?>

            @foreach ($anys as $any)
         <tbody>
          <tr>
         <?php
            $med=Medico::findOrFail($any->idMedico);
          ?>
      
            <td class="Infactible"><div align="left">{{ $med->idMedico}}</td>
            <td class="Infactible"><div align="left">{{ $med->nombre}}</td>
            <td class="Infactible"><div align="left">{{ $med->especialidad}}</td>
            <td class="Infactible"><div align="left">{{ $med->telefono}}</td>
            <td class="Infactible"><div align="left">{{ $med->correo}}</td>
            <td class="Infactible"><div align="left">{{ $med->direccion}}</td>
           
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
      <center>Reporte de Apoyo para el nivel Operativo de la Clinica Medica Genesis</center>
    </footer>
  </body>
</html>


                       
                        
                        