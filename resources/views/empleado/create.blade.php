

<form action="{{ url('/empleado')}}" method="POST" enctype="multipart/form-data">
    @include('empleado.form' , ['accion' => 'Crear'])
</form>
