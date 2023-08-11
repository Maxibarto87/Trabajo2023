<h1>{{$accion}} Empleado</h1>
@csrf
@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-group">
<label for="nombre_ep">Nombre:</label>
<input class="form-control" type="text" name="nombre_ep" id="nombre_ep" placeholder="Ingrese su Nombre" value="{{isset($empleado->nombre_ep) ? $empleado->nombre_ep : old('nombre_ep')}}">
</div>
<div class="form-group">
<label for="apellido_ep">Apellido:</label>
<input class="form-control" type="text" name="apellido_ep" id="apellido_ep" placeholder="Ingrese su Apellido" value="{{isset($empleado->apellido_ep) ? $empleado->apellido_ep : old('apellido_ep')}}">
</div>
<div class="form-group">
<label for="email_ep">Email</label>
<input class="form-control" type="email_ep" name="email_ep" id="email_ep" placeholder="Ingrese su Email" value="{{isset($empleado->email_ep) ? $empleado->email_ep : old('email_ep')}}">
</div>
<div class="form-group">
<label for="direccion_ep">Dirección:</label>
<input class="form-control" type="text" name="direccion_ep" id="direccion_ep" placeholder="Ingrese su Direccion" value="{{isset($empleado->direccion_ep) ? $empleado->direccion_ep : old('direccion_ep')}}">
</div>
<div class="form-group">
<label for="telefono_ep">Telefonó:</label>
<input class="form-control" type="numbre" name="telefono_ep" id="telefono_ep" placeholder="Ingrese su Numero de Telefono" value="{{isset($empleado->telefono_ep) ? $empleado->telefono_ep : old('telefono_ep')}}">
</div>
<div class="form-group">
<label for="Foto">Foto:</label>
<img class="img-thumbnail img-fluid" src="{{ isset($empleado->Foto) ? asset('storage') . '/' . $empleado->Foto : old('Foto')}}" width="80px">
<input class="form-control" type="file" name="Foto" id="Foto" placeholder="Ingrese su Foto" value="">
</div>
<button class="btn btn-success" type="submit">{{$accion}}</button>
<br>
<a class="btn btn-primary" href="{{url('empleado')}}">Regresar</a>

