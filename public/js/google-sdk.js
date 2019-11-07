window.gapiOnLoadCallback = () => {
    window.gapi.load('auth2', () => {
      window.google_auth2 = window.gapi.auth2.init({
          client_id: '426875113114-ra57sij0inck5a8r78dg1ct0p1nhkffe.apps.googleusercontent.com',
          apiKey: 'AIzaSyAwa0SdYZczASKr3ZM5txlWR3KGwd6nfIg',
          scopes: "https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/analytics"
      })
    })
    this.google_ready = true
  }
  const installGoogleSdkScript = (d, s, id) => {
    if (d.getElementById(id)) {
      this.google_sdk_initialized = true
      return
    }
    let fjs = d.getElementsByTagName(s)[0]
    let js = d.createElement(s)
    js.id = id
    js.src = 'https://apis.google.com/js/platform.js?onload=gapiOnLoadCallback'
    fjs.parentNode.insertBefore(js, fjs)
  }
  installGoogleSdkScript(document, 'script', 'google-jssdk')