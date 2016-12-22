@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Project List</div>
                    <div class="panel-body">
                        @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                            {{ Form::open(['route' => 'projects.store', 'class' => 'form-inline', 'style' => 'padding-top: 10px']) }}
                                <div class="form-group">
                                    <label for="name">Project Name</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Project">
                                </div>
                                <button type="submit" class="btn btn-success">Add New Project</button>
                            </form>
                        @endif
                        <div style="padding-top: 50px" class="col-lg-5">
                            <table class="table table-striped">
                                <thead>
                                    <th>Project Name</th>
                                    <th>Action</th>
                                    @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                                        <th></th>
                                    @endif
                                </thead>
                                <tbody>

                                        @foreach($projects as $proj)
                                            <tr>
                                            <td>{{ $proj->name }}</td>
                                            <td><a href="projects/requirements/{{ $proj->id }}" class="btn btn-primary">Manage</a></td>
                                            @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                                                <td><a href="projects/{{ $proj->id }}/edit" class="btn btn-default">Edit</a></td>
                                            @endif
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection