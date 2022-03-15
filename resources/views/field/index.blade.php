@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 20px;">
                    Fields
                    <a href="{{ route('field.create') }}"><button>Add New</button></a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped- table-bordered table-hover table-checkable" id="user_table">
                       <thead>
                            <tr>
                                <th>Field</th>
                                <th>Label</th>
                                <th>Name</th>
                                <th>Attribute Values</th>
                                <th>Comments</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fields as $field)
                            <tr>
                                <td>{{ $field->field_type }}</td>
                                <td>{{ $field->label }}</td>
                                <td>{{ $field->field_name }}</td>
                                <td>{{ $field->attr_values }}</td>
                                <td>{{ $field->comments }}</td>
                                <td><a href="{{ route('field.edit',$field->id) }}"><button>Edit</button></a></td>
                                <td><a href="{{ route('field.destroy',$field->id) }}" onclick="event.preventDefault();
                                     document.getElementById('delete{{ $field->id }}').submit();"><button>Delete</button></a>
                                     <form id="delete{{ $field->id }}" action="{{ route('field.destroy',$field->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
