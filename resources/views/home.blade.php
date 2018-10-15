@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-borderless">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create </th>
                                <th>Update </th>
                                <th width="280px">Operation</th>
                            </tr>
                            @foreach ($students as $i => $student)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <a href='{{ route('results.index', ['id' => $student->user_id]) }}'>{{  $student->username }}</a>
                                    </td>
                                    <td>{{ $student->mail}}</td>
                                    <td>{{ $student->created_at}}</td>
                                    <td>{{ $student->updated_at}}</td>
                                    <td>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="GET" style='display:inline'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $students->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
