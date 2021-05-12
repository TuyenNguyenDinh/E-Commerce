@extends('layouts.admin')
@section('main')
@section('title','Edit Categories')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active">Edit Categories</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <form id="edit_categories" data-route="{{ route('categories.update', $categories->id) }}" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Name category</label>
                                <input type="text" id="inputName" name="name" value="{{ $categories->name }}" class="form-control">
                            </div>
                            <!--  -->
                            <div class="alert alert-danger print-error-msg" style="display:none">
								<ul></ul>
							</div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Done" class="btn btn-success float-right">
        </div>
    </div>
    </form>
</section>
<!-- /.content -->
<script>
    $('#edit_categories').submit(function(event) {
		var route = $('#edit_categories').data('route');
		var form_date = $(this)
		$.ajax({
			method: 'POST',
			url: route,
			processData: false, // Important!
			contentType: false,
			cache: false,
			data: new FormData(this),
			success: function(response) {
				swal({
					closeOnClickOutside: false,
					icon: "success",
					title: 'Success, edit sussecfully!',
					showSpinner: true
				});
				$(location).attr("href", "http://localhost/ecommerce/E-Commerce/public/admin/categories");
			},
			error: function(response) {
				$(".print-error-msg").find("ul").html('');
				$(".print-error-msg").css('display', 'block');
				var err = JSON.parse(response.responseText);
				$.each(err.errors, function(key, value) {
					$(".print-error-msg").find("ul").append('<li>' + value[0] + '</li>');
				})

			}
		})
		event.preventDefault();
	});
</script>
@stop