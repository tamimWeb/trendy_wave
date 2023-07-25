<!doctype html>
<html class="no-js" lang="en">

<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:70%;padding:20px 0">
      <div style="border-bottom:1px solid #eee">
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('home') }}" class="site-logo"><img
                            src="{{ asset('frontend') }}/images/logo/logo.png" alt="logo"></a>
                </div>
            </div>
        </div>
      </div>
      <p style="font-size:1.1em">Hi,</p>
      <p>Thank you for choosing Trendy Wave. Use the following OTP to complete your Sign Up procedures.</p>
      <h2 style="background: #d63384;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">OTP-{{$otp}}</h2>
      <p style="font-size:0.9em;">Regars,<br />Trendy Wave</p>
      <hr style="border:none;border-top:1px solid #eee" />
      <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
        <p>
            <img src="{{ asset('frontend') }}/images/logo/logo.png" alt="logo" height="30" width="70" >
        </p>
        <p>Agargaon,Dhaka-1207</p>
        <p>Bangladesh</p>
      </div>
    </div>
  </div>

</html>
