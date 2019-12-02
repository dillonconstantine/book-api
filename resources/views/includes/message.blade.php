@if(session()->has('message'))
    <p class="mt-4 text-center {{ session()->get('state') === 'error' ? 'text-red-500' : 'text-green-500' }}">
        {{ session()->get('message') }}
    </p>
@endif
