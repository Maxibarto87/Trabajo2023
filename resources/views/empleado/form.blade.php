formulario que tiene los datos de empleados
    @csrf
    <label for="nombre_ep">Nombre:</label>
    <input type="text" name="nombre_ep" id="nombre_ep" placeholder="Ingrese su Nombre" value="{{isset($empleado->nombre_ep) ? $empleado->nombre_ep :'' }}">
    <br>
    <label for="apellido_ep">Apellido:</label>
    <input type="text" name="apellido_ep" id="apellido_ep" placeholder="Ingrese su Apellido" value="{{isset($empleado->apellido_ep) ? $empleado->apellido_ep :''}}">
    <br>
    <label for="email_ep">Email</label>
    <input type="email_ep" name="email_ep" id="email_ep" placeholder="Ingrese su Email" value="{{isset($empleado->email_ep) ? $empleado->email_ep :''}}">
    <br>
    <label for="direccion_ep">Dirección:</label>
    <input type="text" name="direccion_ep" id="direccion_ep" placeholder="Ingrese su Direccion" value="{{isset($empleado->direccion_ep) ? $empleado->direccion_ep :''}}">
    <br>
    <label for="telefono_ep">Telefonó:</label>
    <input type="numbre" name="telefono_ep" id="telefono_ep" placeholder="Ingrese su Numero de Telefono" value="{{isset($empleado->telefono_ep) ? $empleado->telefono_ep :''}}">
    <br>
    <label for="Foto">Foto:</label>
    <img class="img-thumbnail img-fluid" src="{{ isset($empleado->Foto) ? asset('storage') . '/' . $empleado->Foto : old('Foto')}}" width="80px">
    <br>
    <input type="file" name="Foto" id="Foto" placeholder="Ingrese su Foto" value="">
    <br>
    <input type="submit" value="Enviar">


