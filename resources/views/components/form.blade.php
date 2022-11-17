<div>
    <h2 class="text-lg font-bold mb-4">{{$title}}</h2>
    <form method="{{$method}}" action="{{$route}}" enctype="multipart/form-data">
        @csrf

        {{$slot}}

        <div class="text-right">
            <button type="submit" class="p-2 bg-green-500 text-green-50 rounded-lg">{{$submit}}</button>
        </div>
    </form>

</div>

