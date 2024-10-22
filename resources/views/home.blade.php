<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Congrats you are Logged in.</p>
    <form action="/logout" method="POST">
    @csrf
    <button>Log Out</button>
    </form>
    
    <div style="border: 3px solid black;">
        <h2>Create a new product</h2>
        <form action="/create-prod" method="POST">
            @csrf
            <input type="text" name="prodName" placeholder="Product Name">
            <input type="text" name="prodCat" placeholder="Product Category">
            <textarea name="prodDes" placeholder="Product Description..."></textarea>
            <input name="prodQty"  type="number" placeholder="Product Quantity">
            <input type="number"  name="prodPrice" placeholder="Product Price">

            <input type="submit" value="Save" class="btn btn-success"></br>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>All Items</h2>
        @foreach($items as $item)
        <div style="background-color: gray; padding: 10px; margin: 10px">
            <h3>{{$item['title']}}</h3>
            {{$item['body']}}
        </div>
        @endforeach
    </div>
    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
    </div>
    @endauth
    
</body>
</html>