<script>
     function loadMasterData(type, element, selected = null) {
        $.ajax({
            url: baseurl + "admin/admin/loadMasterData",
            type: 'POST',
            data: {
                'type': type
            },
            dataType: 'json',
            success: function(data) {
                var html = "";
                if (data.flag == 1) {
                    if (data.data.length > 0) {
                        $.each(data.data, function(key, val) {
                            html += '<option  value="' + val.master_key + '">' + val.master_value + '</option>'
                        })
                    }
                } else {
                    html += '<option value="">Something went Wrong..!</option>'
                }
                $('.' + element).empty().html(html);

            
                if(selected!=="" && type == "antsegment_lids"){
                    // alert(element);
                    // $('.' + element).val(JSON.parse(selected)).trigger('change');

                    $('.' + element).val('test').trigger('change');


                }
                else if(selected!=="" && type == "antsegment_conjuctiva"){
                    $('.' + element).val('conhy').trigger('change');


                }
            
            }
        })
    }
</script>