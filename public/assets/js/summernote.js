$(document).ready(function() {
    $('#konten').summernote({
        height: 250,     // tinggi editor
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
});