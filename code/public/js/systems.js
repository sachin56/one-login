// $("#tblproject").DataTable();
$("button.delete").off("click");

//Delete function
$('#tblsystems tbody').on('click','button.delete',function(eventData){

    eventData.stopPropagation();

    var row = $(this).parents("tr");
    let sys_id = (row.find("td:first-child").text());
    let token=$("meta[name='csrf-token']").attr("content");

    if (confirm("Are you sure to delete this System?")){

        var ajaxConfig = {
            method : "DELETE",
            url:"projects/" + sys_id,
            data:{
                "_token":token
            },
            async: true
        }

        $.ajax(ajaxConfig).done(function(response,statusText,jxhr){
            $(row).remove();
        }).fail(function(jxhr,statusText,error){
            alert("unable to delete")
        });
    }
});



//update function
$('button.update').off('click');
var id;
$('#tblsystems tbody').on('click','button.update',function(eventData){
   eventData.stopPropagation();
   var row=$(this).parents('tr');
   id=(row.find('td:first-child').text());
   var system_name=(row.find('td:nth-child(2)').text());
   var domain=(row.find('td:nth-child(3)').text());
   $('#system_name').val(system_name);
   $('#domain').val(domain);

   $("#btnupdate").removeAttr("hidden");
   $("#minimize").click();
   $("i.fa-plus").click();
   $("#btnsubmit").prop("hidden","true");

});

$("#btnupdate").click(function(){
    var formdata=$("#frmsystem").formToJson();

    let formasd = document.forms.namedItem("frmsystem");
    let sysformdata = new FormData(formasd);
    let imgage=$("#attachment").get(0).files[0];
    sysformdata.append('attachment', imgage);

    var ajaxConfig = {
        type : "POST",
        url:"system_Register/update/"+id,
        async: false,
        contentType: false,
        data: sysformdata,
        processData: false
    }

    $.ajax(ajaxConfig).done(function(response,statusText,jxhr){
        alert("Updated Successfully");
        top.location.href="register_system";
    }).fail(function(jxhr,statusText,error){
        alert("Unable to update, try again");
        console.log(error);
    });

});

$("#btnclear").click(function(){
    $("#btnupdate").prop("hidden","true");
    $("#btnsubmit").removeAttr("hidden");
    $("i.fa-plus").click();
});
