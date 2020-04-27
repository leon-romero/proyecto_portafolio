@php
function activar($url){
    return request()->is($url) ? 'btn-primary' : 'btn-outline-secondary';
}
@endphp
<h4 class="my-4">Mi Cuenta</h4>
<div class="list-group">     
        {{-- list-group-item --}}
    <a href="{{ route('shop.perfil') }}" class="btn {{ activar('shop/perfil') }}"><i class="fa fa-user"></i> Perfil</a>
    <a href="{{ route('shop.perfil.direcciones') }}" class="btn {{ activar('shop/perfil/direcciones') }}"><i class="fa fa-map"></i> Direcciones</a>
    <a href="{{ route('shop.perfil.historial') }}" class="btn {{ activar('shop/perfil/historial') }}"><i class="fas fa-list-alt"></i> Historial de Pedidos</a>
</div>
<h4 class="my-4">Configuración</h4>
<div class="list-group">     
    <a href="{{ route('shop.perfil.email') }}" class="btn {{ activar('shop/perfil/email') }}"><i class="fa fa-envelope"></i> Cambiar email</a>
    <a href="{{ route('shop.perfil.password') }}" class="btn {{ activar('shop/perfil/password') }}"><i class="fa fa-unlock"></i> Cambiar contraseña</a>
</div>