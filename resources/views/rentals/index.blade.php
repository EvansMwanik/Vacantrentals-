@extends('layouts.main')

@section('content')

    <div id="admin">

        <h1>Rentals Admin Panel</h1><hr>

        <p>Here you can view rentals.</p>

        <h2>Rentals</h2><hr>

        <ul>
            @foreach($rentals as $rental)
                <li>
                    {!! Html::image($rental->image, $rental->title, array('width'=>'50')) !!}
                    {!! $rental->title !!} 
                    {!! Form::open(array('url'=>'Admin/rentals/delete/id','method' => 'delete', 'class'=>'form-inline')) !!}
                    {!! Form::hidden('id', $rental->id) !!}
                    {!! Form::submit('delete') !!}
                    {!! Form::close() !!} - 
                    <a href="/Admin/rentals/edit/{!! $rental->id !!}"><input type="button" value="edit" class="edit" /></a>
                </li>
            @endforeach
        </ul>
        <p>Add new Rental</p><a href="/Admin/rentals/create"><input type="button" value="Create Rental" class="create" /></a>
    </div>
    @stop

        