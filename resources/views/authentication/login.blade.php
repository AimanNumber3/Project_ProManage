<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        @csrf
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br> 
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br> 
        <button type="submit">Submit</button>
        
    </form>
</body>
</html>