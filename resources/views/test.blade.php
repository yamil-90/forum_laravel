@extends('hijo')


@yield('content')
@foreach($categories as $category)



<li>
    <a href="#">{{$category->name}}</a>
</li>
@endforeach

<p>esto es el padre pero la parte de arriba</p>




