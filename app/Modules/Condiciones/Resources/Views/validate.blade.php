@extends('layouts.app')

@section('content')
@if(is_null($model))
<p>Pagina de validaciones solo testing</p>
@else

@foreach($model as $value)
{{$value->id}}
@endforeach
<p>{{$model}}</p>
@endif
@endsection