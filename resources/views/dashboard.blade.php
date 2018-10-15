@extends('layouts.app')

@section('content')
    <table class="table table-striped table-bordered" id="table" width="100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>
    <script>
        $(function () {
            $('#table').DataTable({
                serverSide: true,
                ajax: '{{ url('home/show') }}',
                columns: [
                    { data: 'action', name: 'action' },
                    { data: 'mail', name: 'mail' }
                ]
            });
        });
    </script>
@endsection