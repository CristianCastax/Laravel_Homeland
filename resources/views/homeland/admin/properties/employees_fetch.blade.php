@extends('layouts.homeland')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Employees fetch</h2>
            <button id="btnGetEmployeesUsingFetch">Get Employees</button>

            <select class="js-data-example-ajax" style="width: 50%;"></select>
            <table id="tblEmployees1">
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

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

