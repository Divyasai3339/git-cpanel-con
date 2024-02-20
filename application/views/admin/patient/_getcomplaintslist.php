<?php
if (!empty($complaints_list)) {
    foreach ($complaints_list as $complaints_key => $complaints_value) {
        ?>
             <li class='option'><label class='checkbox'><input type='checkbox'  name='complaints_title' value='<?php echo $complaints_value->name."\n".$complaints_value->description ; ?>'> <?php echo $complaints_value->name ?></label></li>
        <?php
    }
}
?>
<script type="text/javascript">
	
	$("input[name=complaints_title]").change(function() {
  updateAllChecked();
});

$("input[name=addall]").change(function() {
  if (this.checked) {
    $("input[name=complaints_title]").prop('checked', true).change();
  } else {
    $("input[name=complaints_title]").prop('checked', false).change();
  }
});

function updateAllChecked() {
  $('#complaints_description').val('');
  $("input[name=complaints_title]").each(function() {
    if (this.checked) {
      let old_text = $('#complaints_description').val() ? $('#complaints_description').val() + '\n\n' : '';
     // let eold_text = $('#esymptoms').val() ? $('#esymptoms').val() + '\n\n' : '';
      $('#complaints_description').val(old_text + $(this).val());
      $('#ecomplaints_description').val(old_text + $(this).val());

    }
  })
}
</script>