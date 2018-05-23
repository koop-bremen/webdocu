@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Längengrad</th>
                        <th>Breitengrad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $places as $place )
                        <tr>
                            <td>{{ $place->id }}</td>
                            <td>{{ $place->name }}</td>
                            <td>{{ $place->longitude }}</td>
                            <td>{{ $place->latitude }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
