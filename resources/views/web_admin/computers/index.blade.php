@extends('web_admin.books.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>COMPUTER</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href=""> Create new computer</a>
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
            <th>Price</th>
            <th>CPU</th>
            <th>RAM</th>
            <th>Storage</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        <tr>
            <td>ID</td>
            <td><img src="" class="img-thumbnail" width="75" height="100" alt="Image" alt="Image"></td>
            <td>Name</td>
            <td>Type</td>
            <td>Price</td>
            <td>CPU</td>
            <td>RAM</td>
            <td>Storage</td>
            <td>Detail</td>

            <td>
                <form action="" method="POST">
                    @csrf
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-primary" href="">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </table>
