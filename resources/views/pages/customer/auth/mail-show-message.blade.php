<h1>Please verify your email address using the code to reset the password. Verification Code: <span class="text-sky_blue_color cursor-pointer" id="password-reset-code">{{$code->code}}</span></h1>

<script>
    document.getElementById('password-reset-code').addEventListener('click', function() {
        var codeText = this.innerText;
        var tempInput = document.createElement('textarea');
        tempInput.value = codeText;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
    });
</script>