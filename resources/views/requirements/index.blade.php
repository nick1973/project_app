@extends('layouts.app')

@section('content')
    <div class="container col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Project List</div>
                    <div class="panel-body">
                        <h2>Table below shows all of the projects requirements.</h2>
                        <div class="col-lg-12">
                            {{ Form::open(['route' => 'requirements.add_requirements', 'class' => 'form-inline', 'style' => 'padding-top: 10px']) }}
                                <input name="project_id" value="{{ $project->id }}" hidden>
                            @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                                <button class="btn btn-primary">Add New Requirements</button>
                            @endif
                            </form>
                        </div>
                        <div style="padding-top: 25px" class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                                    <th></th>
                                @endif
                                <th></th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Requirements</th>
                                <th width="250">Process</th>
                                <th>URL</th>
                                <th>Tested By</th>
                                <th>Passed</th>
                                <th>Bugs</th>
                                <th>Aesthetics</th>
                                <th>Wishlist</th>
                                </thead>
                                <tbody>
                                @foreach($requirements as $requirement)
                                    <tr>
                                        @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                                            <td>
                                                <a href="{{ $requirement->id }}/edit" class="btn btn-default btn-xs">Edit</a>
                                            </td>
                                        @endif
                                            <td>
                                            @if($requirement->passed==0)
                                                <a href="{{ $requirement->id }}/edit" class="btn btn-warning btn-xs">Feedback</a>
                                                @else
                                                    @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                                                        <a href="{{ $requirement->id }}/edit" class="btn btn-warning btn-xs">Feedback</a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $requirement->created_at->diffForHumans() }}</td>
                                        <td>{{ $requirement->name }}</td>
                                        <td>{{ $requirement->requirements }}</td>
                                        <td>{{ $requirement->process }}</td>
                                        <td>{{ $requirement->url }}</td>
                                        <td>{{ $requirement->tested_by }}</td>
                                            @if($requirement->passed==1)
                                                <td>YES</td>
                                                @else
                                                <td>No</td>
                                            @endif
                                        <td>{{ $requirement->bugs }}</td>
                                        <td>{{ $requirement->aesthetic }}</td>
                                        <td>{{ $requirement->wish_list }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $requirements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection