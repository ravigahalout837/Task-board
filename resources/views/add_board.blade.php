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
        <div class="content-wrapper">
            <section class="content-header">
                <div class="header-icon">
                    <i class="fa fa-sticky-note-o"></i>
                </div>
                <div class="header-title">
                    <h1>Add Board</h1>
                    <small>Board list</small>
                </div>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group" id="buttonlist">
                                    <a class="btn btn-add" href="">
                                        <i class="fa fa-list"></i> Boards
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form id="boardForm" novalidate>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="userId" name="user_id" value="{{ Auth::check() ? Auth::id() : 1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="boardName">Board Name</label>
                                        <input type="text" class="form-control" name="name" id="boardName" placeholder="Enter board name" required>
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
        </div>
    @endsection

    <script>
        $(document).ready(function() {
            $('#boardForm').submit(function(event) {
                event.preventDefault();

                var userId = $('#userId').val();
                var boardName = $('#boardName').val().trim();
                var token = localStorage.getItem('accessToken');

                // Client-side validation
                if (!boardName) {
                    $('#response').html('<p style="color: red;">Board name is required.</p>');
                    return;
                }

                if (!token) {
                    $('#response').html('<p style="color: red;">Authentication token is missing.</p>');
                    return;
                }

                $.ajax({
                    url: '/api/boards',
                    type: 'POST',
                    data: JSON.stringify({
                        name: boardName,
                        user_id: userId // Ensure it's named correctly
                    }),
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#response').html('<p style="color: green;">Board created successfully!</p>');
                        $('#boardForm')[0].reset();
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : xhr.responseText;
                        $('#response').html('<p style="color: red;">Error: ' + errorMessage + '</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
