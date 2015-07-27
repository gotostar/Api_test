var oFB = (function(param){
    function fbConnect(){ // Facebook Javascript SDK 로딩
        window.fbAsyncInit = function(){
            FB.init({
                appId: param.apiKey // App ID
                ,OAuth: param.OAuth // enable OAuth 2.0
                ,xfbml: true
                ,version: 'v2.4'
            });
            _getStatus(function(res){
                switch (res.status) {
                    case "unknown":
                    case "notConnected":
                    case "not_authorized":
                        break;
                    case "connected":
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
                userINFO: res,
                type : 'insert'
            },
            success: function (resultText) {
                var resultData = $.parseJSON(resultText); //json 변환
                console.log(resultData);
                if(resultData.data){
                    location.href="index.php";
                }
            }
        });
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
            	top.location.href="logout.php";
            });
        }
    };
})(oFBParam);