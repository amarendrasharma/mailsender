@extends('layouts.app')
@section('content')

{{-- @foreach ($templateList as $item)
<p>{{$item}}</p>
@endforeach --}}
'@json($templateList)'
<mail-sender :listmailtemp='@json($templateList)'></mail-sender>
@endsection