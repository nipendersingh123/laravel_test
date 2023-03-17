@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('View Author Info') }} <a class="btn btn-info float-right" href="{{route('add.book')}}">Add Book</a></div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success text-center">{{ session()->get('message') }}</div>
                    @endif
                    

                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>{{$author->id}}</td>
                            </tr> 
                            <tr>
                                <td>Name</td>
                                <td>{{$author->first_name}} {{$author->last_name}}</td>
                            </tr> 
                            <tr>
                                <td>DOB</td>
                                <td>{{date('d , M Y',strtotime($author->birthday))}}</td>
                            </tr> 
                            <tr>
                                <td>Gender</td>
                                <td>{{ucwords($author->gender)}}</td>
                            </tr> 
                            <tr>
                                <td>Birtd Place</td>
                                <td>{{ucwords($author->place_of_birth)}}</td>
                            </tr> 
                            <tr>
                                <td>Biography</td>
                                <td>{{ucwords($author->biography)}}</td>
                            </tr> 
                        </thead>
                    </table>


                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Release Date</th>
                                <th>Description</th>
                                <th>Isbn</th>
                                <th>Format</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($author->books) > 0)
                                @foreach($author->books as $book)
                                    <tr>
                                        <td>{{$book->id}}</td>
                                        <td>{{$book->title}}</td>
                                        <td>{{!empty($book->release_date)?date('d , M Y',strtotime($book->release_date)):''}}</td>
                                        <td>{{ucwords($book->description)}}</td>
                                        <td>{{ucwords($book->isbn)}}</td>
                                        <td>{{ucwords($book->format)}}</td>
                                        <td>
                                            {{--
                                            <a href="{{ route('view.auther',$book->id)}}" class="btn btn-info">View</a>
                                            --}}
                                            <a href="{{ route('delete.book',$book->id)}}" onclick="confirm('Are you sure you want to delete selected record?');" class="btn btn-danger">Delete</a>
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
