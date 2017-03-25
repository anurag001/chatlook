<input type="text" id="name" />
<input type="text" id="value" />

<script>
$(document).ready(function(){
    $("#name").autocomplete({
        source: "json.php",
        select: function (event, ui) {
            $("#name").val(ui.label);
            $("#value").val(ui.value);
        }
    });
});
</script>