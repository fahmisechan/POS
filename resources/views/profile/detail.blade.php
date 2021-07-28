@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                        <td>{{$admin->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                        <td>{{$admin->email}}</td>
                        </tr>
                        <tr>
                            <td>Dibuat</td>
                            <td>:</td>
                        <td>{{$admin->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection