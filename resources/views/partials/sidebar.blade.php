<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Sidebar</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        aside {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            padding: 20px;
        }

        aside h3 {
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        aside ul {
            list-style: none;
        }

        aside ul li {
            margin-bottom: 10px;
        }

        aside ul li a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 12px;
            border-radius: 6px;
            transition: 0.3s;
        }

        aside ul li a:hover {
            background-color: #3498db;
            padding-left: 18px;
        }
    </style>
</head>
<body>

    <aside>
        <h3>Sidebar</h3>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/cars">Cars</a></li>
            <li><a href="/products">Products</a></li>
        </ul>
    </aside>

</body>
</html>
