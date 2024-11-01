<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.update') }}" method="POST" id="edit-task-form">
                    @method('POST')
                    @csrf
                    <input class="id" type="hidden" name="id" id="id" class="form-control">

                    <div class="mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" class="title form-control @error('title') is-invalid @enderror"
                            id="editTaskTitle" name="title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="editTaskDescription" class="form-label">Task Description</label>
                        <textarea class="description form-control @error('description') is-invalid @enderror" id="editTaskDescription"
                            name="description" rows="3"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="editTaskStatus" class="form-label">Status</label>
                        <select class="status form-select @error('status') is-invalid @enderror" id="editTaskStatus"
                            name="status" required>
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
