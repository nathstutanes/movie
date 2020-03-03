<?php
require_once 'header.php';
secho form_open_multipart('Create/genre_create'); 
echo form_label('Genre: ');
echo "<br>";
$data = array(
        'name'=>'strGenre',
        'id'=>'name',
        'value'=>'',	
        'size'=>'50'
);
echo form_input($data)."<br>";
echo form_submit('genre_create', 'Submit');
echo form_close( );
  ?>