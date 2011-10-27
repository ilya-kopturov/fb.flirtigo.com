window.fbAsyncInit = function() {
    FB.init({
        appId      : appId,
        //channelURL : '//WWW.YOUR_DOMAIN.COM/channel.html',
        cookie: true, 
        xfbml: true,
        oauth: true
    });
    FB.Canvas.setSize();
    // Additional initialization code here
    //alert('init:'+appId);
    FB.Event.subscribe('auth.login', function(response) {
        //window.location = /*canvas_url;*/  BASE_URL + 'fb_login.php';
        top.location = canvas_url;
        //top.location.reload();
    });
/*
    FB.Event.subscribe('auth.login',
        function(response) {
            //alert('You liked the URL: ' + response);
            window.location = BASE_URL + 'fb_login.php';
        }
    );
*/
/*
    FB.getLoginStatus(function(response) {
        if (response.authResponse) {
            // logged in and connected user, someone you know
            alert('logged in and connected user, someone you know');
        } else {
            // no user session available, someone you dont know
            alert('no user session available, someone you dont know');
        }
    });
*/
/*
    FB.login(function(response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            alert ('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Good to see you, ' + response.name + '.');
                alert ('Good to see you, ' + response.name + '.');
                FB.logout(function(response) {
                    console.log('Logged out.');
                    alert ('Logged out.');
                });
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
            alert ('User cancelled login or did not fully authorize.');
        }
    }, {scope: 'email'});
*/
};
    
    // Load the SDK Asynchronously
(function(d) {
    var js, id = 'facebook-jssdk';if (d.getElementById(id)) {return;}
    js = d.createElement('script');js.id = id;js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    d.getElementsByTagName('head')[0].appendChild(js);
} (document));
 
 