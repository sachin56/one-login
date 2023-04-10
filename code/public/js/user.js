var tblusers;
$(document).ready(function () {
    $("#systems").select2();
   $("#tblusers").DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        url:"/User_Register"
    },
    "columns": [
        { "data": "id"},
        { "data": "name"},
        { "data": "name"},
        { "data": "name"},
        { "data": "email" },
        { "render": function(data,type,row,meta){
            return '<button class="btn-xs btn-dark" onclick="getData('+row.id+')">Edit</button>'
            +" "+'<button class="btn-xs btn-danger delete">Delete</button>';
        } }
    ]
   });
});
var user_id;
function getData(id) {

    user_id=id;

    let ajaxConfig = {
        method: "GET",
        url: "User_Register/" + id,
        async: true,
    };

    $.ajax(ajaxConfig)
        .done(function (response, statusText, jxhr) {
            let res=response.sytems.map(({sys_id})=>sys_id);
            $("#name").val(response.name);
            $("#email").val(response.email);
            $("#gender").val(response.gender);
            $("#phone").val(response.phone);
            $("#systems").val(res).change();

            $("#btnupdate").removeAttr("hidden");
            $("#minimize").click();
            $("i.fa-plus").click();
            $("#btnsubmit").prop("hidden", "true");
        })
        .fail(function (jxhr, statusText, error) {
            alert("unable to get data");
        });
}

$("#btnupdate").click(function(){
    let formdata=$("#frmusers").formToJson();
    let systems=$("#systems").val();
    formdata.systems=systems;
    let ajaxConfig = {
        method : "PUT",
        url:"User_Register/"+user_id,
        async: true,
        contentType: "application/json",
        data: JSON.stringify(formdata)
    }

    $.ajax(ajaxConfig).done(function(response,statusText,jxhr){
        alert("Updated Successfully");
        top.location.href="register_user";
    }).fail(function(jxhr,statusText,error){
        alert("Unable to update, try again");
        console.log(error);
    });

});
