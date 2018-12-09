@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                                   <div class="row">
                    User name: {{$user->name}}
                </div>
                <div class="row">
                    User email: {{$user->email}}
                </div>
                <div class="row">
                    User level: {{$user->level->name}}
                </div>
                <div class="row">
                    User balance: {{$user->balance->sum('amount')}}
                </div>
                @if(!$user->referal->isEmpty())
                <div class="row">
                    <h4>User Referals:</h4>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nr</th>
                                <th>Name</th>
                                <th>Comision</th>

                            </tr>
                            </thead>
                            @foreach($user->referal  as $referal)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$referal->name}}</td>
                                    <td>{{$referal->from_referal->sum('amount')}}</td>

                                </tr>
                            @endforeach

                        </table>

                    </div>

                </div>
                @endif
                    </div>
                </div>
 
            </div>
        </div>
    </div>
@endsection
