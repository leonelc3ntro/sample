<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">	
	
</head>
<body>
	<div id="app">
	
		<div class="container">


			<div class="row">
			    <div class="col-lg-12 margin-tb">					
			        <div class="pull-left">
			            <h2>Books</h2>
			        </div>
			        <div class="pull-right">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-book">
						  Create Book
					</button>
			        </div>
			    </div>
			</div>

			<table class="table table-bordered">
				<thead>
				    <tr>
					<th>Name</th>
					<th>Description</th>
					<th width="200px">Action</th>
				    </tr>
				</thead>
				<tbody>
				</tbody>
			</table>

			<ul id="pagination" class="pagination-sm"></ul>

		    <!-- Create Book Modal -->
			<div class="modal fade" id="create-book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <h4 class="modal-name" id="myModalLabel">Create Book</h4>
			      </div>
			      <div class="modal-body">

			      		<form data-toggle="validator" action="{{ route('book-ajax.store') }}" method="POST">
			      			<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<input type="text" name="name" class="form-control" data-error="Please enter name." required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="description">Description:</label>
								<textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn crud-submit btn-success">Submit</button>
							</div>
			      		</form>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Edit Book Modal -->
			<div class="modal fade" id="edit-book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <h4 class="modal-name" id="myModalLabel">Edit Book</h4>
			      </div>
			      <div class="modal-body">

			      		<form data-toggle="validator" action="/book-ajax/14" method="put">
			      			<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<input type="text" name="name" class="form-control" data-error="Please enter Name." required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="description">Description:</label>
								<textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
							</div>
			      		</form>

			      </div>
			    </div>
			  </div>
			</div>

		</div>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

        <script type="text/javascript">
    	   var url = "<?php echo route('book-ajax.index')?>";
        </script>
        <script src="{{ asset('/js/books.js') }}"></script> 

</body>
</html>