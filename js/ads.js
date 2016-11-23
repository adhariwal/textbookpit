$(document).ready(function()
{
    $("#selectCategory").change(function()
    {
            var id=$('#selectCategory').val();
            // var cct = $("input[name=csrf_token_name]").val();
            $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/subcategory/getSubCatByCatId",
            dataType: 'json',
            data: {'id': id, "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"},
            success: function(res) {
                alert(res);
            }
          });
    });
});