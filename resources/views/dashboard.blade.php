@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4"></div>
<div class="flex  bg-grey-lighter justify-between px-5">

	@component('layouts.components.card',[ 'file'=> url('/img/svg/json.svg') ])
	JSON
	@endcomponent

	@component('layouts.components.card',[ 'file'=> url('/img/svg/xlsx.svg') ])
	XLSX
	@endcomponent

	@component('layouts.components.card',[ 'file'=> url('/img/svg/csv.svg') ])
	CSV
	@endcomponent
</div>

@endsection