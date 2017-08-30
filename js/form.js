$("#RForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "من فضلك قم بإدخال البيانات بصورة صحيحة");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#prenom").val();
    var phone= $("#phone").val();
    var email = $("#email").val();
    var phone2 = $("#phone2").val();
    var address =$("#address").val();

    $.ajax({
        type: "POST",
        url: "Rform.php",
        data: (name:name ,email:email,phone2:phone2,phone:phone,address:address),
        success : function(text){
            alert(text);
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#RForm")[0].reset();
    submitMSG(true, "تم التسجيل في الدورة بنجاح . سنقوم بالرد عليك لاحقا ")
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "sendmessage";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}