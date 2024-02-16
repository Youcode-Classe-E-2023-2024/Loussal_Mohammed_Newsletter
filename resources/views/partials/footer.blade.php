<script src="https://cdn.tailwindcss.com"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/loader.js')}}"></script>
<script src="{{asset('js/scrollspyNav.js')}}"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="{{ asset('js/filepond/custom-filepond.js') }}"></script>
<script src="{{ asset('js/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
<script src="{{ asset('js/filepond/filepondPluginFileValidateType.min.js') }}"></script>
<script src="{{ asset('js/filepond/filepondPluginImageCrop.min.js') }}"></script>
<script src="{{ asset('js/filepond/filepondPluginImageExifOrientation.min.js') }}"></script>
<script src="{{ asset('js/filepond/filepondPluginImagePreview.min.js') }}"></script>
<script src="{{ asset('js/filepond/filepondPluginImageResize.min.js') }}"></script>
<script src="{{ asset('js/filepond/filepondPluginImageTransform.min.js') }}"></script>
<script>
    multifiles.addFiles("{{ asset('images//list-blog-style-2.jpg') }}");
</script>
</html>
