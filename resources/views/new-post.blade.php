<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Pos Baru</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            //initialize summernote
            $('.summernote').summernote();
            @if(isset($post))
            //assign the variable passed from controller to a JavaScript variable.
            var content = {!! json_encode($post->konten) !!};
            //set the content to summernote using `code` attribute.
            $('.summernote').summernote('code', content);
            @endif
        });
    </script>
</head>

<body>
    <form action="{{ isset($post) ? "/edit-pos/{$post->id}" : '/buat-pos-baru' }}" method="POST">
        {{ csrf_field() }}
        <textarea name="konten_pos" class="summernote"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>