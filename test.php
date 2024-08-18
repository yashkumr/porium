<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" id="form">

        <input id="hello" type="text">
        <input type="submit" id="submit" value= "submit">
    </form>
</body>
</html>
<script>

    document.getElementById("form").addEventListener("submit",function(event){
        event.preventDefault();
        let x = document.getElementById("hello").value;
        console.log(x);
    });


</script>