<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Board</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @extends('layouts.master')
    @section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon">
                    <i class="fa fa-sticky-note-o"></i>
                </div>
                <div class="header-title">
                    <h1>Add Tasks</h1>
                    <small>Task list</small>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- Form controls -->
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group" id="buttonlist">
                                    <a class="btn btn-add" href="">
                                        <i class="fa fa-list"></i> Task
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form id="boardForm" novalidate>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="boardId" name="boardId" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="boardName">titlw Name</label>
                                        <input type="text" class="form-control" name="tilte" id="title" placeholder="Enter task name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="boardName"> description</label>
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter  description" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-add">Save</button>
                                    </div>
                                </form>
                                <div id="response"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    @endsection

    <script>
        $(document).ready(function () {
            $('#boardForm').on('submit', function (event) {
                event.preventDefault();

                var token = localStorage.getItem('accessToken');
                var userId = $('#boardId').val(); // Retrieve user ID from the hidden input
                var boardName = $('#title').val().trim(); // Retrieve and trim board name
                var boardName = $('#description').val().trim()
                // Validate form fields
                if (!boardName) {
                    $('#response').html('<div class="alert alert-danger">Error: Board name is required.</div>');
                    return;
                }

                if (!token || !userId) {
                    $('#response').html('<div class="alert alert-danger">Error: Access token or user ID not found. Please log in.</div>');
                    return;
                }

                $.ajax({
                    url: '/api/tasks',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        title: title,
                        board_id: boardId,
                        description:description // Pass user ID along with board name
                    },
                    success: function (response) {
                        $('#response').html('<div class="alert alert-success">Board created successfully: ' + response.name + '</div>');
                    },
                    error: function (xhr) {
                        $('#response').html('<div class="alert alert-danger">Error: ' + xhr.responseText + '</div>');
                    }
                });
            });
        });
    </script>
</body>

</html>
