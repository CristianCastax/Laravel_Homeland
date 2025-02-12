@include('header')

<h2>Servicios</h2>
<ul>
    @foreach ($services as $service)
        <li>{{ $service->name }} ({{$service->descripcion}})</li>
    @endforeach
</ul>


@include('footer')
