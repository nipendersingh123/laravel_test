@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Book') }}</div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success text-center">{{ session()->get('message') }}</div>
                    @endif
                    
                    <form action="{{ route('add.newbook') }}" method="post" >
                        {{ csrf_field() }}
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" name="title" class="form-control"  /></td>
                                </tr> 
                                <tr>
                                    <td>Auther</td>
                                    <td>
                                        <select name='auther' class="form-control">
                                            <option value=''> Select Auther</option>
                                            @if($authors->total_results > 0)
                                                @foreach($authors->items as $author)
                                                <option value='{{$author->id}}'>{{$author->first_name}} {{$author->last_name}}</option>
                                                @endforeach
                                            @endif 
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>Date</td>
                                    <td><input type="date" name="release_date" class="form-control"  /></td>
                                </tr> 
                                <tr>
                                    <td>Description</td>
                                    <td><textarea type="text" name="description" class="form-control"  ></textarea></td>
                                </tr> 
                                <tr>
                                    <td>isbn</td>
                                    <td><input type="text" name="isbn" class="form-control"  /></td>
                                </tr> 
                                <tr>
                                    <td>format</td>
                                    <td><input type="text" name="format" class="form-control"  /></td>
                                </tr> 
                                <tr colspan="2">
                                    <td><input type="submit" class="btn btn-info" value="Add Book" /></td>
                                </tr> 
                            </thead>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
