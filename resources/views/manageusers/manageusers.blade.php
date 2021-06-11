@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="panel-body">
                        <h1 class="m-4">Users Management</h1>


                        @if (count($users) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach ($users as $user)
                                    @if ($user->email == 'ibrahim@example.com')

                                    @else
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td>
                                                {!! Form::open(['action' => ['App\Http\Controllers\AdminControllerUsers@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        @else
                            <p>no users</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
