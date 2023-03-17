@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a class="btn btn-info float-right" href="{{route('add.book')}}">Add Book</a></div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success text-center">{{ session()->get('message') }}</div>
                    @endif
                    

                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Birth Place</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($authors->total_results > 0)
                                @foreach($authors->items as $author)
                                    <tr>
                                        <td>{{$author->id}}</td>
                                        <td>{{$author->first_name}} {{$author->last_name}}</td>
                                        <td>{{date('d , M Y',strtotime($author->birthday))}}</td>
                                        <td>{{ucwords($author->gender)}}</td>
                                        <td>{{ucwords($author->place_of_birth)}}</td>
                                        <td>
                                            <a href="{{ route('view.auther',$author->id)}}" class="btn btn-info">View</a>

                                            <a href="{{ route('delete.auther',$author->id)}}" onclick="confirm('Are you sure you want to delete selected record?');" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif    
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
