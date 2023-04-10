<!DOCTYPE html>
<html>
<head>
    <title>Maga Engineering</title>
</head>
<body>
    Dear {{$user}},
    <p>Please find the following system generated password as you requested. If not please report this to IT Department.</p>
    <h5>New Password={{ $password }}</h5>
    <p>Change the above password ones you access the system by navigating to the user profile.</p>
    <p>Thanks & Regards,<br>
    systems@maga.lk</p>
    <img src="{{ $img }}"  width="80" height="40">
</body>
</html>
