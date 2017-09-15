$(function(){
$("#gift11").addClass("gift_on");
$("#gift11").click(function(){

    document.getElementById("c_name").value    = $("#g_name11").text(); // let hide field get  selected gift name
    document.getElementById("univalent").value = $(".bjprace11").text();   //let  hide field get selected gift name univalent
    document.getElementById("gift_id").value   = $("#s_id11").val(); //let hide field get selected gift id
    document.getElementById("gift_vote").value = $("#g_number11").text();//let the hide field get the selected gift  number votes

 $("#cont").val(1);
 $("#price").val($(".bjprace11").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift16,#gift12,#gift17,#gift13,#gift15,#gift18,#gift19").removeClass("gift_on");
    $(".count_jg").css("display","block");
    var first = $(".bjprace11");// 获得ID为first标签的jQuery对象
        var second = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP = $(".price");// 获得ID为first标签的jQuery对象
        first.change(function(){  
            var num1 = first.text();// 取得first对象的值  
            var num2 = second.val();// 取得second对象的值  
            var sum = (num1-0)*(num2-0);  
            sumSP.val(sum);  
        });  
        second.change(function(){  
            var num1 = first.text();  
            var num2 = second.val();  
            var sum = (num2-0)*(num1-0);  
            sumSP.val(sum);  
        }); $("#price").val(1);})
    $("#gift14").click(function(){

        document.getElementById("c_name").value     = $("#g_name14").text(); // let hide  field get  selected gift name
        document.getElementById("univalent").value  = $(".bjprace14").text();//let hide field get selected gift name univalent
        document.getElementById("gift_id").value    = $("#s_id14").val(); // let hide field get selected gift name gift_id
        document.getElementById("gift_vote").value = $("#g_number14").text();//let the hide field get the selected gift  number votes

    $("#cont").val(1);
 $("#price").val($(".bjprace14").text());
    $(this).addClass("gift_on");
    $("#gift11,#gift16,#gift12,#gift17,#gift13,#gift15,#gift18,#gift19").removeClass("gift_on");
    $(".count_jg2").css("display","block");
    /*$(".count_jg,.count_jg3,.count_jg4,.count_jg5,.count_jg6,.count_jg7,.count_jg8,.count_jg9").css("display","none");
   */ var first2 = $(".bjprace14");// 获得ID为first标签的jQuery对象  
        var second2 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP2 = $(".price");// 获得ID为first标签的jQuery对象  
        first2.change(function(){  
            var num3= first2.text();// 取得first对象的值  
            var num4 = second2.val();// 取得second对象的值  
            var sum2 = (num3-0)*(num4-0);  
            sumSP2.val(sum2);
        });  
        second2.change(function(){  
            var num3 = first2.text();  
            var num4 = second2.val();  
            var sum2 = (num4-0)*(num3-0);  
            sumSP2.val(sum2);  
        });  })
    $("#gift16").click(function(){

        document.getElementById("c_name").value     = $("#g_name16").text();//let hide  field get selected gift name
        document.getElementById("univalent").value  = $(".bjprace16").text();//let hide field get selected gift name univalent
        document.getElementById("gift_id").value    = $("#s_id16").val();//let hide field get selected gift name id
        document.getElementById("gift_vote").value = $("#g_number16").text();//let the hide field get the selected gift  number votes

    $("#cont").val(1);
 $("#price").val($(".bjprace16").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift11,#gift12,#gift17,#gift13,#gift15,#gift18,#gift19").removeClass("gift_on");
    $(".count_jg3").css("display","block");
     var first3 = $(".bjprace16");// 获得ID为first标签的jQuery对象  
        var second3 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP3 = $(".price");// 获得ID为first标签的jQuery对象  
        first3.change(function(){  
            var num5= first3.text();// 取得first对象的值  
            var num6 = second3.val();// 取得second对象的值  
            var sum3 = (num5-0)*(num6-0);  
            sumSP3.val(sum3);  
        });  
        second3.change(function(){  
            var num5 = first3.text();  
            var num6 = second3.val();  
            var sum3 = (num6-0)*(num5-0);  
            sumSP3.val(sum3);  
        }); })
    $("#gift12").click(function(){

        document.getElementById("c_name").value    = $("#g_name12").text(); //let  the hide  field get the   selected gift name
        document.getElementById("univalent").value = $(".bjprace12").text();//let the hide field get the selected gift name univalent
        document.getElementById("gift_id").value   = $("#s_id12").val();//let the hide field get the selected gift name id
        document.getElementById("gift_vote").value = $("#g_number12").text();//let the hide field get the selected gift  number votes

    $("#cont").val(1);
 $("#price").val($(".bjprace12").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift16,#gift11,#gift17,#gift13,#gift15,#gift18,#gift19").removeClass("gift_on");
    $(".count_jg4").css("display","block");
   var first4 = $(".bjprace12");// 获得ID为first标签的jQuery对象  
        var second4 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP4 = $(".price");// 获得ID为first标签的jQuery对象  
        first4.change(function(){  
            var num7= first4.text();// 取得first对象的值  
            var num8 = second4.val();// 取得second对象的值  
            var sum4 = (num7-0)*(num8-0);  
            sumSP4.val(sum4);  
        });  
        second4.change(function(){  
            var num7 = first4.text();  
            var num8 = second4.val();  
            var sum4 = (num8-0)*(num7-0);  
            sumSP4.val(sum4);  
        });  })
    $("#gift17").click(function(){

        document.getElementById("c_name").value    = $("#g_name17").text(); //let the hide  field  get the selected gift name
        document.getElementById("univalent").value = $(".bjprace17").text();//let the hide field get the selected gift name univalent
        document.getElementById("gift_id").value   = $("#s_id17").val();//let the hide field get the selected gift id
        document.getElementById("gift_vote").value = $("#g_number17").text();//let the hide field get the selected gift  number votes

    $("#cont").val(1);
 $("#price").val($(".bjprace17").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift16,#gift12,#gift11,#gift13,#gift15,#gift18,#gift19").removeClass("gift_on");
    $(".count_jg5").css("display","block");
   var first5 = $(".bjprace17");// 获得ID为first标签的jQuery对象  
        var second5 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP5 = $(".price");// 获得ID为first标签的jQuery对象  
        first5.change(function(){  
            var num9= first5.text();// 取得first对象的值  
            var num10 = second5.val();// 取得second对象的值  
            var sum5 = (num9-0)*(num10-0);  
            sumSP5.val(sum5);  
        });  
        second5.change(function(){  
            var num9 = first5.text();  
            var num10 = second5.val();  
            var sum5 = (num10-0)*(num9-0);  
            sumSP5.val(sum5);  
        });  })
    $("#gift13").click(function(){

        document.getElementById("c_name").value    = $("#g_name13").text();  //let the hide  field  get the selected gift name
        document.getElementById("univalent").value = $(".bjprace13").text(); //let the hide field get the selected gift name univalent
        document.getElementById("gift_id").value   = $("#s_id13").val();//let the hide field get the selected  gift id
        document.getElementById("gift_vote").value = $("#g_number13").text();//let the hide field get the selected gift  number votes

    $("#cont").val(1);
 $("#price").val($(".bjprace13").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift16,#gift12,#gift17,#gift11,#gift15,#gift18,#gift19").removeClass("gift_on");
    $(".count_jg6").css("display","block");
    var first6 = $(".bjprace13");// 获得ID为first标签的jQuery对象  
        var second6 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP6 = $(".price");// 获得ID为first标签的jQuery对象  
        first6.change(function(){  
            var num11= first6.text();// 取得first对象的值  
            var num12 = second6.val();// 取得second对象的值  
            var sum6 = (num11-0)*(num12-0);  
            sumSP6.val(sum6);  
        });  
        second6.change(function(){  
            var num11 = first6.text();  
            var num12 = second6.val();  
            var sum6 = (num12-0)*(num11-0);  
            sumSP6.val(sum6);  
        });  })
    $("#gift15").click(function(){

        document.getElementById("c_name").value    = $("#g_name15").text(); //let the  hide  field  get the selected gift name
        document.getElementById("univalent").value = $(".bjprace15").text();//let the hide field get the selected gift name univalent
        document.getElementById("gift_id").value   = $("#s_id15").val();//let the hide field get the selected gift id
        document.getElementById("gift_vote").value = $("#g_number15").text();//let the hide field get the selected gift  number votes

    $("#cont").val(1);
 $("#price").val($(".bjprace15").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift16,#gift12,#gift17,#gift13,#gift11,#gift18,#gift19").removeClass("gift_on");
    $(".count_jg7").css("display","block");
   var first7 = $(".bjprace15");// 获得ID为first标签的jQuery对象  
        var second7 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP7 = $(".price");// 获得ID为first标签的jQuery对象  
        first7.change(function(){  
            var num13= first7.text();// 取得first对象的值  
            var num14 = second7.val();// 取得second对象的值  
            var sum7 = (num13-0)*(num14-0);  
            sumSP7.val(sum7);  
        });  
        second7.change(function(){  
            var num13 = first7.text();  
            var num14 = second7.val();  
            var sum7 = (num14-0)*(num13-0);  
            sumSP7.val(sum7);  
        });  })
    $("#gift18").click(function(){

        document.getElementById("c_name").value    = $("#g_name18").text();//let the hide field get the selected gift name
        document.getElementById("univalent").value = $(".bjprace18").text();//let the hide field get the selected gift name univalent
        document.getElementById("gift_id").value   = $("#s_id18").val();//let the hide field get the selected gift id
        document.getElementById("gift_vote").value = $("#g_number18").text();//let the hide field get the selected gift  number votes

         $("#cont").val(1);
 $("#price").val($(".bjprace18").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift16,#gift12,#gift17,#gift13,#gift15,#gift11,#gift19").removeClass("gift_on");
    $(".count_jg8").css("display","block");
   var first8 = $(".bjprace18");// 获得ID为first标签的jQuery对象  
        var second8 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP8 = $(".price");// 获得ID为first标签的jQuery对象  
        first8.change(function(){  
            var num15= first8.text();// 取得first对象的值  
            var num16 = second8.val();// 取得second对象的值  
            var sum8 = (num15-0)*(num16-0);
            sumSP8.val(sum8);
        });  
        second8.change(function(){  
            var num15 = first8.text();  
            var num16 = second8.val();  
            var sum8 = (num16-0)*(num15-0);
            sumSP8.val(sum8);
        });  })
    $("#gift19").click(function(){

        document.getElementById("c_name").value    = $("#g_name19").text();//let the hide field get the selected gift name
        document.getElementById("univalent").value = $(".bjprace19") .text();//let the hide field get the selected gift name univalent
        document.getElementById("gift_id").value   = $("#s_id19").val();//let the hide field the get the selected gift  id
        document.getElementById("gift_vote").value = $("#g_number19").text();//let the hide field get the selected gift  number votes

    $("#cont").val(1);
 $("#price").val($(".bjprace19").text());
    $(this).addClass("gift_on");
    $("#gift14,#gift16,#gift12,#gift17,#gift13,#gift15,#gift18,#gift11").removeClass("gift_on");
    $(".count_jg9").css("display","block");
     var first9 = $(".bjprace19");// 获得ID为first标签的jQuery对象  
        var second9 = $(".count");// 获得ID为first标签的jQuery对象  
        var sumSP9 = $(".price");// 获得ID为first标签的jQuery对象  
        first9.change(function(){  
            var num17= first9.text();// 取得first对象的值  
            var num18 = second9.val();// 取得second对象的值  
            var sum9 = (num17-0)*(num18-0);  
            sumSP9.val(sum9);
        });  
        second9.change(function(){  
            var num17 = first9.text();  
            var num18 = second9.val();  
            var sum9 = (num18-0)*(num17-0);  
            sumSP9.val(sum9);
        });  });

    });  