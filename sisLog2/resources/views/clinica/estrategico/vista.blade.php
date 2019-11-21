
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte Clinica Génesis</title>
    
    <style type="text/css">

      hr {
          border-color: #5acc82;
          height: 1px;
          margin: 5px 0;
          display: block;
          clear: both;
      }

      table {
            
            background-color: #fafbfb;
            margin-bottom: 1rem;
            width: 100%;

      }

      tr{
            border: #5acc82 1px solid;
      }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="..\public\img\2695.jpg" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Clinica Médica Génesis <br> Reporte de cantidad de pacientes atendidos por medicos</font></h1>
      
      
      <br><br><br><br>


    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
            <th class="Infactible" bgcolor="#D0D3D4">Nombre Medico</th>
            <th class="Infactible" bgcolor="#D0D3D4">Especialidad</th>
            <th class="Infactible" bgcolor="#D0D3D4">Cantidad Pacientes</th>
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
            $nomMedico=Medico::findOrFail($any->idMedico);
          ?>
          
            <td class="Infactible"><div align="left">{{ $nomMedico->nombre }}</div></td>
            <td class="Infactible"><div align="left">{{ $any->tCons}}</div></td>
            <td class="Infactible"><div align="left">{{ $any->cant}} </div></td></td>
            </td>
            
           
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
      <center>Reporte de Apoyo para los tomadores de decision de nivel Tactico para Clinica Medica Genesis</center>
    </footer>
  </body>
</html>