@extends('layouts.app')
@section('content')
<mail-sender :listmailtemp='@json($templateList)'></mail-sender>
@endsection