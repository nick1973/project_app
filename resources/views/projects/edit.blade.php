@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Project Name</div>
                    <div class="panel-body">
                        {{ Form::model($project, ['route' => ['projects.update', $project->id], 'class' => '', 'method' => 'PATCH']) }}
                            <div class="form-group col-lg-5">
                                <label for="name">Project Name</label>
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection