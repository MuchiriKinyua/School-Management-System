@extends('layouts.app')

@section('content')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center"> <!-- Added 'text-center' to center the text -->
                <h1>Uploads</h1>
            </div>
        </div>
    </div>
</section>

<body>
    <!-- Wrapper to control the width and center the dropzone -->
    <div class="dropzone-wrapper" style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <!-- Correct the route here -->
        <form action="{{ route('uploadFile') }}" class="dropzone"></form>
    </div>

<script type="text/javascript">

var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

Dropzone.autoDiscover = false;

var myDropzone = new Dropzone(".dropzone", {
    maxFilesize: 2, // 2 MB
    acceptedFiles: ".jpeg,.jpg,.png,.pdf"
});

myDropzone.on("sending", function(file, xhr, formData) {
    formData.append("_token", CSRF_TOKEN); // Append CSRF token
});

myDropzone.on("success", function(file, response) { 
    if(response.success == 0) { // If there is an error
        alert(response.error); 
    } else {
        alert('File uploaded successfully!');
    }
});

</script>

</body>

<div class="content px-3">
    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        @include('uploads.table')
    </div>
</div>

@endsection
