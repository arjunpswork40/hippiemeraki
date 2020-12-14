
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Zubis INN ">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zubis INN </title>
    
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/zubis/css/bootstrap.min.css') }}" type="text/css">


</head>

<body>


<div class="paymentStatus">
<div class="paymentStatus__innerbox">
    <h1>Payment Successfull  </h1>
</div>
<a href="" class="btn btn-success">  Ok</a>
</div>

<style>

.paymentStatus{
    display: flex;
    flex-direction: column; 
    justify-content: center;
    align-items: center;
    height: 100vh;

}

.paymentStatus h1{
    font-family: 'Roboto', sans-serif;

}

.paymentStatus__innerbox{
    color: #fff;
    text-align: center;
    font-size: 16px;
    padding: 30px;
    background-color: #f2cf07;
    background-image: linear-gradient(315deg, #e2c72f 0%, #55d284 74%);
    box-shadow: 2px 3px 8px -3px #151d31;
    border-radius: 8px;
}
body{
    background: #44566f;
}
a{
    margin-top: 27px;
    width: 186px;
    height: 50px;
    text-align: center !important;
    padding: 10px 0px 0px 0px !important;
    font-size: 18px !important;
    font-weight: 600 !important;
}



</style>

</body>
</html>
