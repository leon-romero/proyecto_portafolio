<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('paciente.create')}}">crear paciente</a>

    <table class="egt" border="1">
  <tr>
    <td>run</td>
    <td>usuario</td>
    <td>correo</td>
    <td>comuna</td>
    <td>region</td>
  </tr>
  @foreach ($pacientes as $p)
 <tr>
    <td>{{$p->run}}</td>
    <td>{{$p->username}}</td>
    <td>{{$p->correo}}</td>
    <td>{{$p->comuna->nombre_comuna}}</td>
    <td>{{$p->comuna->region->nombre_region}}</td>
  </tr>
  @endforeach
</table>
</body>
</html>