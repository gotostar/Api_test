var oFB = (function(param){
    function fbConnect(){ // Facebook Javascript SDK 로딩
        window.fbAsyncInit = function(){
            FB.init({
                appId: param.apiKey // App ID
                ,OAuth: param.OAuth // enable OAuth 2.0
                ,xfbml: true
                ,version: 'v2.1'
            });
            _getStatus(function(res){

                switch (res.status) {
                    case "unknown":
                    case "notConnected":
                    case "not_authorized":
                        //oFB.fbLogin(thisPage);
                        break;
                    case "connected":
                        if(thisPage == 'voc_message') {
                            DirectMessageAPI(res);
                        } else if(thisPage == 'voc_comments') {
                            comments(res);
                        } else if(thisPage == 'voc_others'){
                            postByOthersAPI(res);
                        } else if(thisPage == 'voc_database'){
                        	voc_database();
                        }

                        break;
                }
            });
        };
    };
    (function(d) {
        var js, id = "facebook-jssdk";if(d.getElementById(id)) {return;}
        js = d.createElement("script");js.id = id;js.async = true;js.src = "//connect.facebook.net/ko_KR/sdk.js";
        d.getElementsByTagName("head")[0].appendChild(js);
        if(js.readyState){
            //IE용 script 레디 상태 체크
            js.onreadystatechange = function() {
                if(this.readyState == "complete" || this.readyState == "loaded") {
                    fbConnect();
                }
            };
        }else{
            js.onload = function(){
                fbConnect();
            }
        }
    }(document));
    function _getStatus(cb){ // Facebook 로그인 및 ALLOW 상태 체크
        FB.getLoginStatus(function(res){
            return cb(res);
        },"perms");
    }

    //유저정보 가져오기
    function fbUserData(){
        FB.api("/me",function(res){
            setFbUserData(res);
        });
    }

    //connected 일때 유저정보 입력
    function setFbUserData(res){
        $.ajax({
            type: "POST",
            url: "ajax/fbUserData.php",
            data:{
                userINFO: res
            },
            success: function (resultText) {
                var resultData = $.parseJSON(resultText); //json 변환

                setUserJoinCheck(res);
            }
        });
    }
    //UserJoinCheck
    function setUserJoinCheck(res) {

        $.ajax({
            type: "POST",
            url: "ajax/joinUserData.php",
            data:{
                userID: res.id,
                userName: res.name,
                type: 'check'
            },
            success: function (resultText) {
                var resultData = $.parseJSON(resultText); //json 변환

                if(resultData.status == 200) {

                        $("#Dim").show();
                        $("#userUid").val(res.id);
                        $("#userProfile").attr("src","https://graph.facebook.com/v2.3/"+res.id+"/picture");
                        $("#userName").text(res.name);

                        $("#applyForm").show();

                }else {
                    if(resultData.data[0].role == 'Master') {
                        location.href='admin_account.php';
                    }else {
                        location.href='tracking_facebook.php';
                    }

                }
            }
        });
    }
    function SendDM(message_id, message, access_token){

        if(message_id != '' && message != '') {

            FB.api(
                "/"+message_id+"/messages",
                "POST",
                {
                    "message": message,
                    "access_token": access_token
                },
                function (response) {
                    if (response && !response.error) {
                        return true;
                    }
                }
            );
        }else {
            alert('관리자 권한이 없습니다!');
            return 0;
        }
    }
    return {
        //페이스북 로그인
        fbLogin : function(gubun){
            FB.login(function(res){

                if(res.status=="connected"){
                    fbUserData();
                    //setUserJoinCheck(res);
                }else if(res.status =="unknown") {
                  /*  $("#Dim").show();
                    $("#NotLoginPop").show();*/
                }else {
                    /*$("#Dim").show();
                    $("#NotLoginPop").show();*/
                }
            },{scope:param.perms});
        },
        fbLogout : function(){
        	FB.logout(function(response) {
            	//alert("로그아웃 되었습니다.");
            	top.location.href="index.php";
            });
        },
        GetAccount : function(message_id, message) {
            FB.api(
                "/me/accounts",
                function(response) {
                    $.each(response.data, function (key, value) {
                        if(value.id == "254787104685218") {
                            var access_token = '';
                            access_token = value.access_token;
                            var resultDM = SendDM(message_id, message, access_token);
                            return resultDM;
                        }
                    });
                }
            );
        }
    };
})(oFBParam);