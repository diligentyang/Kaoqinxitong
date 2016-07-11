/***
   *
 **/
//
//标签页
$('#myTabs_none a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myalert_none').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var name = button.data('dismiss') 
  var modal = $(this)
  modal.find('.modal-title').html(recipient+"<span style='color:red;'>"+name+"</span>"+"的考勤记录")
  modal.find('.modal-body input').val(recipient)
});


//alert($(".dropdown-year li"));
$(".dropdown-year li").on('click',function(event){
	$("#year").val($(this).text());
});

//密码修改
$("#hidden_button2").on('click',function(){
	
	$("#hidden_button").trigger('click');
	
});


//日历
 $('.form_date').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
    });
	

	//update class
	$("#update").on("click",function(){
		//alert($("#update_title").html()+","+);
		$("#update_title").html($(this).parent().attr('id')+"班");
		$("#class").val($(this).parent().attr('id'));
		
	});
	
	//assistantClass
	$("#first").trigger("click");

//名册导入获取班级与课程
$("#studentsExcel li:first").addClass("active");
$("#uploadModal div:first").addClass("in active");

$("#studentsExcel li").click(function(){
    var id = $(this).attr("lixianID");
    var classNow = $(this).attr("dataClass");
    var aID = $(this).attr("assistantID");
    var user_data={"class":classNow};
    var require_url = $(this).attr("data_Url");
    //alert(require_url);
    getAjax(user_data,require_url);
    //获取sID与sCourse
    active_modal();
    //上传表格
   $("#class"+id).val($(this).attr("dataClass"));
    $("#course"+id).val($(this).attr("dataCourse"));
    $("#assistantID"+id).val($(this).attr("assistantID"));
    $("#title"+id).html("添加"+classNow+"班的学生");
});
$("#studentsExcel li:first").trigger("click");

function getAjax(user_data,require_url){
    $.ajax({
        type: "POST",
        url: require_url,
        data:user_data,
        async: false,
        success: function (data) {
           // alert(data);
            if(data!="empty") {
                $("#" + user_data.class).html(data);
                //alert(data);
            };
        }
    });
}
function active_modal() {
    $(".add_tag").click(function () {
        var className = $(this).parents(".tab-pane").attr("id");
        var sID = $(this).parents("li").find(".sID").val();
        var sCourse = $(this).parents("li").find(".sCourse").val();
        var sName = $(this).parents("li").find(".sName").val();
        //alert(sName);
        $("#myalert .sID").val(sID);
        $("#myalert .courseID").val(sCourse);
        $("#myalert .sClass").val(className);
        $("#myalert .sName1").val(sName);
        $("#exampleModalLabel").html("添加<span style='color:red;'>" + sName + "</span>" + "的考勤记录");
    });

    $(".remove_tag").click(function () {
        //alert("aaa");
        //$("#remove").html("取消<span style='color:red;'>"+$("#name").val()+"</span>"+"的考勤记录");
        var sID = $(this).parents("li").find(".sID").val();
        var sCourse = $(this).parents("li").find(".sCourse").val();
        var sName = $(this).parents("li").find(".sName").val();
        var removeUrl = $(this).parents("li").find(".removeUrl").val()
        var className = $(this).parents(".tab-pane").attr("id");
        $("#myalert_remove .sID").val(sID);
        $("#myalert_remove .courseID").val(sCourse);
        $("#myalert_remove .removeUrl").val(removeUrl);
        $("#myalert_remove .sClass").val(className);
        $("#remove").html("取消<span style='color:red;'>" + sName + "</span>" + "的考勤记录");
        var user_data1 = {"sID": sID, "sCourse": sCourse};
        remove_ajax(user_data1, removeUrl);
    });



    $(".update").on('click', function () {

        var className = $(this).parents(".tab-pane").attr("id");

        //var sID = $(this).parents(".tab-pane").find(".sID").val();
        var sCourse = $(this).parents(".tab-pane").find(".sCourse").val();
        var aID = $(this).parents(".tab-pane").find(".sAssistant").val();
       // var classNow = $(this).parents(".tab-pane").attr("id");alert(classNow);
       // var sName = $(this).parents(".tab-pane").find(".sName").val();
        $("#myalert_update .courseID").val(sCourse);
        $("#myalert_update .aID").val(aID);
        $("#myalert_update .className").val(className);
        $("#update_title").html("重新导入<span style='color:red;'>" + className + "</span>" + "班的学生");

    });

}



//移除标签ajax
/*
    $("#myalert_remove").on('show.bs.modal', function () {
        var sID = $("#myalert_remove .sID").val();
        var sCourse = $("#myalert_remove .courseID").val();
        var require_url1 = $("#myalert_remove .removeUrl").val();
        var user_data1 = {"sID": sID, "sCourse": sCourse};
       // remove_ajax(user_data1, require_url1);
    });*/
function remove_ajax(user_data,require_url){

    $.ajax({
        type: "POST",
        url: require_url,
        data:user_data,
        async: false,
        success: function (data) {
           // alert(data);
            $("#removeTagsForCheckBox").html(data);
        }
    });
}


$(document).ready(function(){
    $("#sub_add").click(function(){
        //alert();
        //$("#form_li").submit();
        $("#date_add").removeAttr("readonly");
        if($("#date_add").val()==""){
            alert("请选择日期");
        }else{
            $("#sub_add_l").click();
        }
    })

    $("#tPwd_sub").click(function() {
        if($("#pwd_old").val()==""){
            alert("请输入旧密码");
        }else if($("#pwd_new1").val()==""){
            alert("请输入新密码");
        }else if($("#pwd_new2").val()==""){
            alert("请再次输入新密码");
        }else if($("#pwd_new1").val()!=$("#pwd_new2").val()){
            alert("两次密码输入不一致");
        }else{
            var url=$("#url_upde").val();
            var password = $("#pwd_old").val();
            $.post(url,{password:password},function(data) {
                if(data=="false"){
                    alert("旧密码不正确!");
                }else{
                    $(".update_pwd").click();
                }
            })
        }
    })

})

window.onload = function(){
    //重新导入后激活li
    var count = 0;
    if(count==0) {
        var idForLi = $("#checkClickLiForActive").val();

        $("#" + idForLi).trigger("click");
        $("#" + idForLi).addClass("active").siblings("li").removeClass("active");
      $($("#" + idForLi+" a").attr("href")).addClass("active in").siblings().removeClass("active in");
    }

}


$(document).ready(function(){
    $(".ysy1").click(function(){
        var course_id=($(this).attr("ysy1"));
        var url11=$(".ysyin1").val();
        $.post(url11,{course_id:course_id},function(data) {
            $("#"+course_id).html(data);
        })
    })
    $(".ysy1:first").click();


    if($(window).width()<1210){
        $("#tianqi").hide();
    }
})

