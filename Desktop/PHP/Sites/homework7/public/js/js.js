function addGoods(id)
{
    jQuery.ajax({
        type: "POST",
        url: "?p=basket&a=ajaxAdd&id=" + id,
        success: function(data) {
            jQuery("#basket").html(data);
        }
    });
}

function deleteGood(id)
{
    jQuery.ajax({
        type: "POST",
        url: "?p=basket&a=ajaxDelete&id=" + id,
        success: function(data) {
            jQuery("#basket").html(data);
        }
    });
}