@props(['name', 'label', 'placeholder', 'errors', 'value'])
<div class="mt-2 mb-4">
    <div class="flex ">
        <label class="w-24 text-gray-500 text-sm" for="{{$name}}">{{$label}}</label>
        <textarea name="{{$name}}" placeholder="{{$placeholder}}" class="tinymce w-64 border border-gray-400 rounded-sm p-1">{!! old($name, $value) !!}</textarea>
    </div>
    <x-form-error name="{{$name}}" :errors="$errors"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" integrity="sha512-RnlQJaTEHoOCt5dUTV0Oi0vOBMI9PjCU7m+VHoJ4xmhuUNcwnB5Iox1es+skLril1C3gHTLbeRepHs1RpSCLoQ==" crossorigin="anonymous"></script>
    <script>
        var editor_config = {
            relative_urls : false,
            path_absolute: "{{config('app.url')}}",
            selector: '.tinymce',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks fullscreen',
                'contextmenu paste help wordcount code'
            ],
            toolbar: ' undo redo |  bold italic | link | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | removeformat | code | help',
        }
        tinymce.init(editor_config);
    </script>
</div>

