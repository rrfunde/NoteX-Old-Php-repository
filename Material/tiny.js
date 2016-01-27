<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    statusbar: false,
    theme: "modern",
     removed_menuitems: "newdocument strikethrough formats  undo redo",
    plugins: [
        "advlist autolink lists link image charmap print preview hr ",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media  save table contextmenu directionality",
        "  paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile  | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist   | link image ",
menubar: ' edit insert format',

    image_advtab: true,
    
      setup: function(editor) {
        editor.addButton('mybutton', {
            text: 'My button',
            icon: false,
            onclick: function() {
                editor.insertContent('Main button');
            }
        });
    }
});

$(document).ready(function(){
  $('#title').focus();
    $('#text').autosize();
});
</script>
>
