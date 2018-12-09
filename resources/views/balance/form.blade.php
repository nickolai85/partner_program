@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add balance</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('balance.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="amount" class="col-md-4 control-label">Amount</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" class="form-control" name="amount"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="user_id" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <select name="user_id"  class="form-control">
                                        <option value="">Choose</option>
                                        @foreach ($users as $key => $value )

                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
