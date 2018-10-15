@extends('layouts.app')

@section('content')
    <table class="table table-striped table-bordered" id="table" width="100%" data-content="{{ $studentId }}}">
        <thead>
        <tr>
            <th>Video title</th>
            <th>Video path</th>
            <th>Uploaded date</th>
            <th>Result event1</th>
            <th>Result event2</th>
        </tr>
        </thead>
    </table>
    <script>
        $(function () {
            $('#table').DataTable({
                serverSide: true,
                ajax: '{{ url('/students/student/' .$studentId) }}',
                columns: [
                    { data: 'video_name', name: 'video_name' },
                    { data: 'action', name: 'action' },
                    { data: 'uploaded_date', name: 'uploaded_date' },
                    { data: 'results.event1', name: 'results.event1' },
                    { data: 'results.event2', name: 'results.event2' }
                ]
            });
        });
    </script>
@endsection