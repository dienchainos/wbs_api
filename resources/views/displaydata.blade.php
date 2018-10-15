@extends('layouts.app')

@section('content')
    <table class="table table-striped table-bordered" id="table" width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Name</th>
            <th>Name</th>
            <th>Name</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
    </table>
    <script>
        $(function () {
            $('#table').DataTable({
                serverSide: true,
                ajax: '{{ url('dis/index') }}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'email', name: 'email'},
                    {data: 'email', name: 'email'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'}
                ]
            });
        });
    </script>
@endsection