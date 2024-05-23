<!-- index.blade.php -->
@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Salary</h1>
        <div class="mb-2 mb-md-0">
            <a class="btn btn-success" href="javascript:void(0)" id="createNewSalary"> Create New Salary</a>
        </div>
    </div>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Nominal</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="salaryForm" name="salaryForm" class="form-horizontal">
                        <input type="hidden" name="salary_id" id="salary_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Name" value="" maxlength="100" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nominal</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="nominal" name="nominal"
                                    placeholder="Enter Nominal" value="" required="">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('salaries.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'nominal',
                        name: 'nominal'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#createNewSalary').click(function() {
                $('#saveBtn').val("create-salary");
                $('#salary_id').val('');
                $('#salaryForm').trigger("reset");
                $('#modelHeading').html("Create New Salary");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.editSalary', function() {
                var salary_id = $(this).data('id');
                $.get("{{ route('salaries.index') }}" + '/' + salary_id + '/edit', function(data) {
                    $('#modelHeading').html("Edit Salary");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#salary_id').val(data.id);
                    $('#name').val(data.name);
                    $('#nominal').val(data.nominal);
                })
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#salaryForm').serialize(),
                    url: "{{ route('salaries.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#salaryForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deleteSalary', function() {
                var salary_id = $(this).data("id");

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('salaries.store') }}" + '/' + salary_id,
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });

            $('body').on('click', '.showSalary', function() {
                var salary_id = $(this).data('id');
                $.get("{{ route('salaries.index') }}" + '/' + salary_id, function(data) {
                    $('#modelHeading').html("Show Salary");
                    $('#saveBtn').val("edit-salary");
                    $('#ajaxModel').modal('show');
                    $('#salary_id').val(data.id);
                    $('#name').val(data.name);
                    $('#nominal').val(data.nominal);
                    $('#name').prop('disabled', true);
                    $('#nominal').prop('disabled', true);
                    $('#saveBtn').hide();
                })
            });
        });
    </script>
@endsection
