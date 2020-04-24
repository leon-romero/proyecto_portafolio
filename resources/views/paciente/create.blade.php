<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('paciente.index')}}">volver a paciente</a>
<form method="post" action="{{route('paciente.store')}}">
   <p>
       @csrf
       <label for="username">run:</label>
       <input type="text" name="run" />
       
       <br />
       <label for="pass">nombre:</label>
       <input type="text" name="nombre"  />
       <br>
       <label for="username">correo:</label>
       <input type="email" name="correo"  />
       
       <br />
       <label for="comuna">comuna:</label>

       <select  name="id_comuna">
            @foreach ($comunas as $c)
       <option value="{{$c->id_comuna}}">{{$c->nombre_comuna}}</option> 
            @endforeach
         
       </select> 
       
       <br />
       <button type="submit">enviar</button>
       {{-- comentarios ocultos --}}
   </p>
</form>
</body>
</html>