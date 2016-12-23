@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Requirements</div>
                    <div class="panel-body">
                        @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                            <h2>Edit Requirements for {{ $project->name }}.</h2>
                            @else
                            <h2>Adding / Editing Feedback for {{ $project->name }}.</h2>
                        @endif
                            <button class="btn btn-default" onclick="goBack()">Back</button>
                        {{ Form::model($requirements, ['route' => ['requirements.update', $requirements->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
                        <input name="project_id" value="{{ $requirements->project_id }}" hidden>
                        @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                                <?php $readonly = '' ?>
                            @else
                                <?php $readonly = 'readonly' ?>
                        @endif
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control"
                                           id="name" placeholder="Name" value="{{ Auth::user()->name }}" {{ $readonly }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Requirement</label>
                                <div class="col-sm-10">
                                    <textarea name="requirements" class="form-control" {{ $readonly }}>{{ $requirements->requirements }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label" {{ $readonly }}>Process</label>
                                <div class="col-sm-10">
                                    <textarea name="process" class="form-control" {{ $readonly }}>{{ $requirements->process }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">URL?</label>
                                <div class="col-sm-10">
                                    <input name="url" type="text" class="form-control" id="url"
                                           placeholder="URL" value="{{ $requirements->url }}" {{ $readonly }}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Developed</label>
                                <div class="col-sm-10">
                                    <?php
                                    $checked = 'checked';
                                    $yes = '';
                                    if($requirements->developed==1) {
                                        $yes = 'checked';
                                        $checked = '';
                                    }
                                    ?>
                                    <label class="radio-inline">
                                        <input type="radio" name="developed" id="developed" value="1" {{ $yes }}> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="developed" id="inlineRadio2" value="0" {{ $checked }}> No
                                    </label>
                                </div>
                            </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tested By</label>
                            <div class="col-sm-10">
                                <input name="tested_by" type="text" class="form-control"
                                       id="tested_by" placeholder="Name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Passed</label>
                            <div class="col-sm-10">
                                <?php
                                $checked = 'checked';
                                $yes = '';
                                    if($requirements->passed==1) {
                                            $yes = 'checked';
                                            $checked = '';
                                        }
                                    ?>
                                <label class="radio-inline">
                                    <input type="radio" name="passed" id="passed" value="1" {{ $yes }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="passed" id="inlineRadio2" value="0" {{ $checked }}> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">
                                Bugs
                                <i style="color: red" class="fa fa-info-circle fa-lg" data-container="body" data-toggle="popover"
                                   data-placement="left" data-content="Bugs are when the requirement you are
                                        testing doesn't work or work as you expected."></i>
                            </label>
                            <div class="col-sm-10">
                                <textarea name="bugs" class="form-control">{{ $requirements->bugs }}</textarea>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">
                                    Aesthetics
                                    <i style="color: red" class="fa fa-info-circle fa-lg" data-container="body" data-toggle="popover"
                                       data-placement="left" data-content="Aesthetics is when you think things would look better
                                       a different way on the layout or a change of colour."></i>
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="aesthetic" class="form-control">{{ $requirements->aesthetic }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">
                                    Wishlist
                                    <i style="color: red" class="fa fa-info-circle fa-lg" data-container="body" data-toggle="popover"
                                       data-placement="left" data-content="Add Ideas here about the requirements
                                       additional functions or processes."></i>
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="wish_list" class="form-control">{{ $requirements->wish_list }}</textarea>
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-sm-10 pull-right">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </div>
                        </form>
                        @if(Auth::user()->name == "Nick" || Auth::user()->name == "Trevor")
                            {!! Form::open(['method' => 'DELETE',
                                           'route' => ['requirements.destroy', $requirements->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection