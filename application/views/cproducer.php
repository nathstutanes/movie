<?php
require_once 'header.php';
echo form_open_multipart('Create/producer_create'); 

echo form_label('Producer:   ');
echo form_input()."<br>";
$data = array(
        'name'=>'strProducer',
        'id'=>'name',
        'value'=>'',	
        'size'=>'50'
);
echo form_label('Contact Email Address: ');
echo form_input($data)."<br>";
$data = array(
    'name'=>'hypContactEmailAddress',
    'id'=>'name',
    'value'=>'',	
    'size'=>'50'
);
echo form_label('Website: ');
echo form_input($data)."<br>";
$data = array(
    'name'=>'hypWebsite',
    'id'=>'name',
    'value'=>'',	
    'size'=>'50'
);
echo form_submit('producer_create', 'Submit');
echo form_close( );
  ?>