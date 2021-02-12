

    <div class="w-full h-auto flex flex-col md:flex-row justify-center items-center md:p-8">
    @foreach($query as $query)
        <div class="w-full flex flex-row h-32 md:w-3/12 mx-2">
            <div class="w-6/12 flex flex-wrap capitalize font-futura align-middle mr-2  tracking-wide text-md md:text-left">
                {{$query->title}}
            </div>
            <div class="w-6/12 flex flex-wrap ">
                <div class="w-full h-auto mx-auto">
                    <img class="object-cover w-full m-auto block" src="{{asset($query->cover_image)}}"/>
                </div>
            </div>
        </div>
    @endforeach
</div>


