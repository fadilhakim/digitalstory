function googleLogin() {
    var payload = {};
    var self = window;
    window.google_auth2.signIn().then(() => {
        data = window.google_auth2.currentUser.get();
        console.log("TCL: googleLogin -> data", data);
        var payload = {
            email: data.w3.U3,
            access_token: data.Zi.access_token
        }
        login(payload);
    });
}

function login(data) {
    var baseurl = window.location.protocol + '//' + window.location.host;

    if(window.location.host.indexOf('localhost') > -1) baseurl = baseurl + '/digitalstory';

    $.post(baseurl + '/auth/google_auth', data, function (res) {
        Cookies.set('gacctkn', res.access_token);
        window.location.pathname = '/digitalstory/dashboard/analytic';
    });
}