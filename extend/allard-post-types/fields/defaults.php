<?php
//set up the defualts for a wysiwyg
$journal_wysiwyg = array(
        'wpautop' => false, // use wpautop?
        'media_buttons' => false, // show insert/upload button(s)
        'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
        'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
        'tabindex' => '',
        'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
        'editor_class' => '', // add extra class(es) to the editor textarea
        'teeny' => true, // output the minimal editor config used in Press This
        'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
        'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
        'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
    );
