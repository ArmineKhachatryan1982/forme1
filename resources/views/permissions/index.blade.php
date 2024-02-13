@extends('layouts.admin_app')


@section('content')
    <div class="container mx-5">
        <div class="cabinet-content">


            <div class='col-lg-4 col-lg-offset-4'>

                <h3 classs="my-3"><i class='fa fa-key'></i>Ավելացնել իրավունք</h3>
                <br>

               {{ Form::open(array('route' => 'permissions.store','method'=>'POST')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Անուն') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div><br>

                <br>
                {{ Form::submit('Ավելացնել', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>Իրավունքներ</th>
                            <th>Գործողություն</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!} --}}
                            {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                            {!! Form::close() !!}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>

@endsection
