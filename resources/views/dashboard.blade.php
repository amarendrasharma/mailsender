@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4">

	<div class="flex justify-between w-full h-56 bg-white mb-5">
		<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" class="relative">
			<defs>
				<pattern id="pattern_6xhrW" patternUnits="userSpaceOnUse" width="9.5" height="9.5"
					patternTransform="rotate(45)">
					<line x1="0" y="0" x2="0" y2="9.5" stroke="#2A4365" stroke-width="1" />
				</pattern>
			</defs>
			<rect width="100%" height="100%" fill="url(#pattern_6xhrW)" :opacity="1" />
		</svg>
		<div class=" pl-16 py-4 absolute capitalize flex justify-between" style="left:0">
			<div>
				<h3 class="text-6xl">Chithi</h3>
				<h5 class="text-lg">Mass mail sender</h5>
			</div>
		</div>
		<div class="pr-16 py-4 absolute capitalize flex justify-between" style="right:0">
			{{-- <div>
				<h3 class="text-6xl">Chithi</h3>
				<h5 class="text-lg">Mass mail sender</h5>
			</div> --}}
			<div style="height: 20px;">
				<img src="/img/maildashboard.svg" class="img-rounded h-48">
			</div>
			<div class="flex justify-between align-bottom mb-0">
				<img src="/img/svg/json.svg" class="img-rounded h-24">
				<img src="/img/svg/xlsx.svg" class="img-rounded h-24">
				<img src="/img/svg/csv.svg" class="img-rounded h-24">
			</div>
		</div>
	</div>
</div>
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