@extends('layouts.homeland')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Properties</h2>
            <table id="tblProperties1">
                <thead>
                    <tr>
                        <td>Address</td>
                        <td>Price</td>
                        <td>Listing Type</td>
                        <td>Offer Type</td>
                        <td>City</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->price }}</td>
                            <td>{{ $property->listType->name }}</td>
                            <td>{{ $property->offer_type }}</td>
                            <td>{{ $property->city->name }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            <h2>PROPERTIES WITH AJAX</h2>


            <table id="tblProperties2">
                <thead>
                    <tr>
                        <td>Address</td>
                        <td>Price</td>
                        <td>Listing Type</td>
                        <td>Offer Type</td>
                        <td>City</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
