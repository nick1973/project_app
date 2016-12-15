@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Project List</div>
                    <div class="panel-body">
                        <h2>Create Requirements for {{ $project->name }}.</h2>
                        {{ Form::open(['route' => 'requirements.store', 'class' => 'form-horizontal', 'style' => 'padding-top: 10px']) }}
                        <input name="project_id" value="{{ $project->id }}" hidden>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control"
                                       id="name" placeholder="Name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Requirement</label>
                            <div class="col-sm-10">
                                <textarea name="requirements" class="form-control"
                                          placeholder="Please state the new requirement for the project"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Process</label>
                            <div class="col-sm-10">
                                <textarea name="process" class="form-control"
                                          placeholder="Please list the process in which the end-user will interact with the new requirement"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">URL?</label>
                            <div class="col-sm-10">
                                <input name="url" type="text" class="form-control" id="url" placeholder="URL">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 pull-right">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection