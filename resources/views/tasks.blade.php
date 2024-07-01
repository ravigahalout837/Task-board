@extends('layouts.master')
@section('content')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>task</h1>
                <small>task List</small>
            </div>
        </section>
       

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="">
                                    <h4>Add task</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="/add-task"> <i class="fa fa-plus"></i> Add
                                        task
                                    </a>
                                </div>

                            </div>
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>No.</th>
                                            <th> Name</th>
                                            <th> Description</th>
                                            <th>Actions</th>

                                            

                                        </tr>
                                    </thead>
                                    @foreach ($task as $task)
                                        <tbody>
                                            <tr>
                                               
                                                <td>{{ $task['id'] }}</td>
                                                <td>{{ $task['title'] }}</td>
                                                <td>{{ $task['description'] }}</td>

                                             

                                                <td>
                                                    <a href="">
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#customer2">
                                                            <i class="fa fa-trash-o"></i>

                                                        </button>
                                                        <a href=""><button
                                                                class="btn btn-success" style='font-size:7px'>Edit
                                                            </button>
                                                        </a>

                                                        </button>
                                                        <a href=""><button
                                                                class="btn btn-primary" style='font-size:7px'>view task
                                                            </button>
                                                        </a>
                                                    </a>

                                                </td>
                                            </tr>

                                            </a>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      @endsection