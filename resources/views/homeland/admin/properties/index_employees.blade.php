@extends('layouts.homeland')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Properties</h2>
            <table id="tblProperties1">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Numero de empleado</td>
                        <td>Email</td>
                        <td>Genero</td>
                        <td>Departamento</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employ)
                        <tr>
                            <td>{{ $employ->first_name??'undefined' }}</td>
                            <td>{{ $employ->emp_number??'undefined' }}</td>
                            <td>{{ $employ->email??'undefined' }}</td>
                            <td>{{ $employ->gender??'undefined' }}</td>
                            <td>{{ $employ->department??'undefined' }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection
