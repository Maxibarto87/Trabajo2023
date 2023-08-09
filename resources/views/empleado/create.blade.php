formulario de creacion de empleados

<form action="{{ url('/empleado')}}" method="POST" enctype="multipart/form-data">
    @include('empleado.form')
</form>
