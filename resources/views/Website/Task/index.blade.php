@extends('Master.master')

@section('content')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card text-dark bg-light">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Task Management</h5>

                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add New
                            Task</a>
                    </div>

                    <div class="card-body" id="tasksTable">
                        <h5 class="card-title">Task List</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>User</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $loop->iteration + ($tasks->currentPage() - 1) * $tasks->perPage() }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description ?? 'No description' }}</td>
                                        <td>{{ ucfirst($task->status) }}</td>
                                        <td>{{ $task->user ? $task->user->name : 'No user' }}</td>
                                        <td>

                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editTaskModal" href="javascript:;"
                                                onclick="editTask({{ $task->id }})">
                                                Edit
                                            </button>

                                            <button type="button" class="btn btn-icon btn-danger"
                                                onclick="confirmDelete('{{ $task->id }}')">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Website.Task.create')
    @include('Website.Task.edit')
@endsection
@push('scripts')
    <script>
        // added Task
        $(document).ready(function() {
            $('#create-task-form').on('submit', function(e) {
                e.preventDefault();
                let storeTaskUrl = "{{ route('tasks.store') }}";
                let csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: storeTaskUrl,
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#tasksTable').load(location.href + ' #tasksTable>*', '');
                            $('#create-task-form').load(location.href + ' #create-task-form>*',
                                '');
                            $('#create-task-form')[0].reset();
                            $('#addTaskModal').modal('hide');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);
                        $('.invalid-feedback').remove();
                        $('.is-invalid').removeClass('is-invalid');
                        for (var key in errors) {
                            var input = $('[name="' + key + '"]');
                            input.addClass('is-invalid');
                            input.after('<div class="invalid-feedback">' + errors[key][0] +
                                '</div>');
                        }
                    }
                });
            });
        });

        function editTask(taskId) {
            $.ajax({
                url: '/tasks/edit/' + taskId,
                type: 'GET',
                success: function(response) {
                    console.log(response.editTask.title)

                    $('.id').val(response.editTask.id);
                    $('.title').val(response.editTask.title);
                    $('.description').val(response.editTask.description);
                    $('.status').val(response.editTask.status);

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }


        $(document).ready(function() {
            $('#edit-task-form').on('submit', function(e) {
                e.preventDefault();
                var updateTaskUrl = "{{ route('tasks.update') }}";
                console.log(updateTaskUrl);
                var formData = new FormData(this);

                $.ajax({
                    url: updateTaskUrl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response.success);
                        if (response.success) {
                            $('#tasksTable').load(location.href + ' #tasksTable>*', '');
                            $('#edit-task-form')[0].reset();
                            $('#editTaskModal').modal('hide');
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON.errors);
                        var errors = xhr.responseJSON.errors;
                        $('.invalid-feedback').remove();
                        $('.is-invalid').removeClass('is-invalid');
                        for (var key in errors) {
                            var input = $('[name="' + key + '"]');
                            input.addClass('is-invalid');
                            input.after('<div class="invalid-feedback">' + errors[key][0] +
                                '</div>');
                        }
                    }
                });
            });
        });

        function confirmDelete(taskId) {
            if (confirm('Are you sure you want to delete this task?' + taskId)) {
                deleteTask(taskId);
            }
        }

        function deleteTask(taskId) {
            let deleteUrl = `/tasks/delete/${taskId}`;
            console.log(deleteUrl);
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    
                    alert(response.message);
                    $('#task-row-' + taskId).remove();
                    $('#tasksTable').load(location.href + ' #tasksTable>*', '');
                },
                error: function(xhr) {
                    if (xhr.status === 403) {
                        alert('You are not authorized to delete this task.');
                    } else {
                        alert('An error occurred while trying to delete the task.');
                    }
                }
            });
        }
    </script>
@endpush
