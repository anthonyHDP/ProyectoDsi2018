@extends ('layouts.admin')
@section ('contenido')
    <h1 align="center" > Sistema Informatico para la automatización de procedimientos de la Clinica Medica Genesis</h1>

    <div class="row">
        


        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/expediente.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Expediente de Paciente</h3></center><center><a href="clinica/paciente"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>

        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/consultaMedica.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center>
            <center><h3>Gestion de Consulta Medica</h3></center><br><center><a href="clinica/consulta"><button class="btn btn-success">Entrar</button></a></center>
            </center>
        </div>
        </div>

        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/doctor.PNG')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Medicos</h3></center><br><center><a href="clinica/medico"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>
        
        <!-- <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/expediente.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Reporte de Pacientes atendidos por Medico</h3></center><center><a href="clinica/paciente"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>

 
        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/expediente.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Reporte de pagos de Consulta</h3></center><center><a href="clinica/paciente"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>
    -->


        <!--<div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/citasMedicas.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Citas Medicas</h3></center><br><center><a href="clinica/cita"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>-->


         <!--<div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/incapacidad.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Incapacidad Medica</h3></center><br><center><a href="clinica/incapacidad"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>-->

    </div>
    <br>
    <div class="row">
        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/expediente.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Generacion de Reportes</h3></center><br><center><a href="/clinica/reportes"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>
        <!--para el otro menu
        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/doctor.PNG')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center>
            <h3>Gestion de Medico <a href="clinica/medico"><button class="btn btn-success">Entrar</button></a></h3>
            </center>
        </div>
        </div>
-->

        <!--<div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/consultaMedica.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center>
            <h3>Consulta Medica <a href="clinica/consulta"></center><center><button class="btn btn-success">Entrar</button></a></h3>
            </center>
        </div>
        </div>-->


         <!--<div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/recetas.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center>
            <h3>Resetas Medicas <a href="clinica/receta"></center><center><button class="btn btn-success">Entrar</button></a></h3>
            </center>
        </div>
        </div>-->

         <!--<div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/expediente.png')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Examenes Clinicos</h3></center><center><a href="clinica/examen"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>-->

        <!--<div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/doctor.PNG')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Medicos</h3></center><br><center><a href="clinica/medico"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>-->

    </div>
    
    

@endsection
