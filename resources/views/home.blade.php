@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <table class="table">
                    <thead>
                    <tr>
                        <th>Nr</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Partner</th>
                        <th>view</th>
                        <th>Ballance</th>
                    </tr>
                    </thead>
                    @foreach($users  as $user)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->level ? $user->level->name:''}}</td>
                            <td>{{$user->partner ? $user->partner->name:'-'}}</td>

                            <td><a href="{{route('user', $user->id)}}">view</a>
                            <td>{{$user->balance->sum('amount')}}</td>
                            
                        </tr>
                    @endforeach

                </table>       

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
