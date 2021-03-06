@extends('web_admin.books.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>COMPUTER</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/create"> Create new book</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Type</th>
            <th>Url</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($books as $book)

        <tr>
            <td>{{ ++$i}}</td>
            <td><img src="storage/images/{{$book->book_image}}" class="img-thumbnail" width="75" height="100" alt="Image" alt="Image"></td>
            <td>{{$book->book_name}}</td>
            <td>{{$book->type}}</td>
            <td><a href="{{$book->url}}">{{$book->url}}</a></td>
            <td>{{$book->description}}</td>

            <td>
                <form action="" method="POST">
                    @csrf
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-primary" href="/edit">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach

    </table>
