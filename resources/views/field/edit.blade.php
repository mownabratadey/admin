@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 20px;">
                    Edit Field
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('field.update',$field->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="field_type" class="col-md-4 col-form-label text-md-right">Field Type</label>

                            <div class="col-md-6">
                                <select id="field_type" class="form-control" name="field_type">
                                    <option value="text" {{ $field->field_type == "text" ? "selected" : "" }}>Text</option>
                                    <option value="number" {{ $field->field_type == "number" ? "selected" : "" }}>Number</option>
                                    <option value="select" {{ $field->field_type == "select" ? "selected" : "" }}>Select</option>
                                </select>

                                @error('field_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label" class="col-md-4 col-form-label text-md-right">Label</label>

                            <div class="col-md-6">
                                <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="{{ $field->label }}" required autocomplete="label">

                                @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="field_name" class="col-md-4 col-form-label text-md-right">Field Name</label>

                            <div class="col-md-6">
                                <input id="field_name" type="text" class="form-control @error('field_name') is-invalid @enderror" name="field_name" value="{{ $field->field_name }}" required autocomplete="field_name">

                                @error('field_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @php
                        $arr = json_decode($field->attr_values);
                        @endphp
                        @if(!empty($arr))
                        @foreach($arr as $arr1)
                        <div class="">
                            <div class="form-group row">
                                <label for="attr_values[]" class="col-md-4 col-form-label text-md-right">Attribute Values</label>

                                <div class="col-md-6">
                                    <input id="attr_values[]" type="text" class="form-control" name="attr_values[]" autocomplete="attr_values[]" value="{{ $arr1 }}">
                                    <a href="javascript:void(0);" class="remove_button" title="Remove field"><button type="button">Remove</button></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        <div class="field_wrapper" style="display: none">
                            <div class="form-group row">
                                <label for="attr_values[]" class="col-md-4 col-form-label text-md-right">Attribute Values</label>

                                <div class="col-md-6">
                                    <input id="attr_values[]" type="text" class="form-control @error('attr_values[]') is-invalid @enderror" name="attr_values[]" autocomplete="attr_values[]">
                                    <a href="javascript:void(0);" class="add_button" title="Add field"><button type="button">Add More</button></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">Comments</label>

                            <div class="col-md-6">
                                <input id="comments" type="text" class="form-control @error('comments') is-invalid @enderror" name="comments" value="{{ $field->comments }}" autocomplete="comments">

                                @error('comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
