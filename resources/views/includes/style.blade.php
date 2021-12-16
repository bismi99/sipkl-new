<!-- css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

{{-- trixeditor --}}
<link rel="stylesheet" type="text/css" href="{{ asset('template/css/trix.css') }}">
<script type="text/javascript" src="{{ asset('template/js/trix.js') }}"></script>
<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }

</style>

{{-- ckeditor --}}
<script src="{{ asset('libraries/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('libraries/ckeditor/samples/js/sample.js') }}"></script>
<link rel="stylesheet" href="{{ asset('libraries/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">

{{-- animation --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

<!-- fontawesome -->
<link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

{{-- data table --}}
<link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

{{-- date --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    rel="stylesheet" />
