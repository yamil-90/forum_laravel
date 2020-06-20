<x-admin-master>

	@section('content')
    @if(auth()->user()->userHasRole('Admin'))
	    <h1 class="h3 mb-4 text-gray-800">dashboard!!!!!!!!!!!!!!!</h1>
    @endif
    {{-- <h1 class="">{{auth()->user()->roles()->role_name}}</h1> --}}
	@endsection

</x-admin-master>
