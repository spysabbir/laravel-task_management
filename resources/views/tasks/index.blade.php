@extends('layouts.master')

@section('title', 'Task')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Task List</h4>
                <div class="action-btn">
                    <!-- Create Button -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add</button>
                    <!-- Create Modal -->
                    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST" id="createForm">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter title">
                                            <span class="text-danger error-text title_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                                            <span class="text-danger error-text description_error"></span>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label>Due Date</label>
                                                <input type="date" class="form-control" name="due_date">
                                                <span class="text-danger error-text due_date_error"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Due Date</label>
                                                <select class="form-select" name="status">
                                                    <option value="">--Select Status--</option>
                                                    <option value="pending" selected>Pending</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                                <span class="text-danger error-text status_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Store</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <!-- Filter -->
                    <div class="col-lg-2">
                        <select class="form-select filter_data" id="filtering">
                            <option value="">--- Filtering ---</option>
                            <option value="pending">Status Pending</option>
                            <option value="completed">Status Completed</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-select filter_data" id="sorting">
                            <option value="">--- Sorting ---</option>
                            <option value="latest">Created Date Latest</option>
                            <option value="oldest">Created Date oldest</option>
                            <option value="due_date_desc">Due Date Latest</option>
                            <option value="due_date_asc">Due Date Oldest</option>
                        </select>
                    </div>
                    <!-- Action Button -->
                    <div class="col-lg-8 d-flex justify-content-end">
                        <button class="btn btn-warning btn-sm m-1" id="pending-all-task">Pending All Task</button>
                        <button class="btn btn-success btn-sm m-1" id="completed-all-task">Completed All Task</button>
                        <button class="btn btn-info btn-sm m-1" id="delete-completed-task">Delete Completed Task</button>
                        <button class="btn btn-danger btn-sm m-1" id="delete-all-task">Delete All Task</button>
                    </div>
                </div>
                <!-- Task Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center table-primary align-middle" id="allDataTable">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Sl No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Due Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="#" method="POST" id="editForm">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <input type="hidden" id="task_id">
                                                <div class="mb-3">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                                                    <span class="text-danger error-text update_title_error"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea>
                                                    <span class="text-danger error-text update_description_error"></span>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label>Due Date</label>
                                                        <input type="date" class="form-control" name="due_date" id="due_date">
                                                        <span class="text-danger error-text update_due_date_error"></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Due Date</label>
                                                        <select class="form-select" name="status" id="status">
                                                            <option value="">--Select Status--</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="completed">Completed</option>
                                                        </select>
                                                        <span class="text-danger error-text update_status_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Show Modal -->
                            <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Task Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="dynamically-model-body">
                                        <!-- Content will be loaded by ajax -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Fetch Task
        $('#allDataTable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: "{{ route('tasks.index') }}",
                "data":function(e){
                    e.filtering = $('#filtering').val();
                    e.sorting = $('#sorting').val();
                },
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'title', name: 'title' },
                { data: 'due_date', name: 'due_date' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Filter Task
        $(document).on('change', '.filter_data', function(e){
            e.preventDefault();
            $('#allDataTable').DataTable().ajax.reload();
        })

        // Store Task
        $('#createForm').on('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: "{{ route('tasks.store') }}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success: function (response) {
                    if(response.status == 400){
                        $.each(response.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        })
                    }else{
                        $('#createForm')[0].reset();
                        $("#createModal").modal('hide');
                        $('#allDataTable').DataTable().ajax.reload();
                        toastr.success(response.message);
                    }
                },
            });
        });

        // View Task
        $(document).on('click', '.viewBtn', function () {
            var id = $(this).data('id');
            var url = "{{ route('tasks.show', ":id") }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    $('#dynamically-model-body').html(response);
                },
            });
        });

        // Edit Task
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id');
            var url = "{{ route('tasks.edit', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    $('#task_id').val(response.id);
                    $('#title').val(response.title);
                    $('#description').val(response.description);
                    $('#due_date').val(response.due_date);
                    $('#status').val(response.status);
                },
            });
        });

        // Update Task
        $('#editForm').on('submit', function (e) {
            e.preventDefault();
            var id = $('#task_id').val();
            var url = "{{ route('tasks.update', ":id") }}";
            url = url.replace(':id', id)
            const formData = new FormData(this);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success: function (response) {
                    if(response.status == 400){
                        $.each(response.error, function(prefix, val){
                            $('span.update_'+prefix+'_error').text(val[0]);
                        })
                    }else{
                        $('#allDataTable').DataTable().ajax.reload();
                        $("#editModal").modal('hide');
                        toastr.success(response.message);
                    }
                },
            });
        });

        // Delete Task
        $(document).on('click', '.deleteBtn', function(){
            var id = $(this).data('id');
            var url = "{{ route('tasks.destroy', ":id") }}";
            url = url.replace(':id', id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        success: function(response) {
                            $('#allDataTable').DataTable().ajax.reload();
                            toastr.warning(response.message);
                        }
                    });
                }
            })
        })

        // Task Status Change
        $(document).on('click', '.statusBtn', function () {
            var id = $(this).data('id');
            var url = "{{ route('tasks.status', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    $('#allDataTable').DataTable().ajax.reload();
                    toastr.success(response.message);
                },
            });
        });

        // Status Pending All Task
        $(document).on('click', '#pending-all-task', function () {
            $.ajax({
                url: "{{ route('tasks.pending.all') }}",
                type: "GET",
                success: function (response) {
                    if (response.status == 200) {
                        $('#allDataTable').DataTable().ajax.reload();
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
            });
        });

        // Status Completed All Task
        $(document).on('click', '#completed-all-task', function () {
            $.ajax({
                url: "{{ route('tasks.completed.all') }}",
                type: "GET",
                success: function (response) {
                    if (response.status == 200) {
                        $('#allDataTable').DataTable().ajax.reload();
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
            });
        });

        // Delete Completed Task
        $(document).on('click', '#delete-completed-task', function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('tasks.delete.completed') }}",
                        method: 'GET',
                        success: function(response) {
                            if (response.status == 200) {
                                $('#allDataTable').DataTable().ajax.reload();
                                toastr.error(response.message);
                            } else {
                                toastr.warning(response.message);
                            }
                        }
                    });
                }
            })
        })

        // Delete All Task
        $(document).on('click', '#delete-all-task', function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('tasks.delete.all') }}",
                        method: 'GET',
                        success: function(response) {
                            if (response.status == 200) {
                                $('#allDataTable').DataTable().ajax.reload();
                                toastr.error(response.message);
                            } else {
                                toastr.warning(response.message);
                            }
                        }
                    });
                }
            })
        })
    })
</script>
@endsection
