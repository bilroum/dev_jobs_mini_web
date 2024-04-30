@if(session()->has('success'))
    <div id='flash-success' class="flex justify-center items-center bg-neonGreen text-white text-md container mx-auto p-2 px-6">
        <p>{{session('success')}}</p>
    </div>
@endif
