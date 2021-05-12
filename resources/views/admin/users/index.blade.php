@extends('layouts.admin')
@section('title','Admin')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th>ID</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr style="text-align: center;">
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->role}}</td>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-danger" onclick="deleteUser('{{$user->id}}')" style="cursor: pointer;"><i class="fas fa-trash"></i></a>
                                            <form id="delete_user_{{$user->id}}" data-route="{{ route('users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                <th>ID</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    function deleteUser(id) {
        var deleteuser = document.getElementById('delete_user_' + id);
        var route = $('#delete_user_' + id).data('route');

        swal({
                title: "Delete?",
                text: "Are you sure delete this user?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: 'DELETE',
                        url: route,
                        processData: false, // Important!
                        contentType: false,
                        cache: false,
                        data: {
                            id: id
                        },
                        success: function(response) {
                            console.log(response)
                            swal({
                                closeOnClickOutside: false,
                                icon: "success",
                                title: 'Success, sucessfully!',
                                showSpinner: true
                            });
                            location.reload();
                        },
                        error: function(response) {
                            console.log(response)
                            swal({
                                closeOnClickOutside: false,
                                icon: "warning",
                                title: 'Error, Please check again!',
                                showSpinner: true
                            });
                        }
                    })
                }
            });
    }
</script>
@endsection