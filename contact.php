<html>
<head>
	<title>My Store Home Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-image: url('Capture d’écran (1).png');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
		}
		header {
			background-color: rgba(0, 0, 0, 0.8);
			color: #fff;
			padding: 20px;
			text-align: center;
		}
		h1 {
			margin: 0;
			font-size: 36px;
			text-transform: uppercase;
		}
		nav {
			background-color: #eee;
			padding: 10px;
			text-align: center;
		}
		nav a {
			display: inline-block;
			padding: 10px;
			text-decoration: none;
			color: #333;
			font-weight: bold;
			text-transform: uppercase;
		}
		nav a:hover {
			background-color: #ccc;
			color: #fff;
		}
		nav ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		nav li {
			display: inline-block;
			position: relative;
		}
		nav ul ul {
			display: none;
			position: absolute;
			top: 100%;
			left: 0;
			background-color: #eee;
			padding: 10px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.5);
		}
		nav ul ul li {
			display: block;
			width: 100%;
		}
		nav li:hover > ul {
			display: block;
		}
		section {
			padding: 20px;
			text-align: center;
			color: #fff;
			text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
		}
		section h2 {
			font-size: 36px;
			margin: 0 0 20px 0;
			text-transform: uppercase;
		}
		section p {
			font-size: 24px;
			margin: 0 0 20px 0;
		}
		footer {
			background-color: rgba(0, 0, 0, 0.8);
			color: #fff;
			padding: 20px;
			text-align: center;
		}
		.button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #333;
			color: #fff;
			text-decoration: none;
			font-weight: bold;
			text-transform: uppercase;
			border-radius: 5px;
			transition: background-color 0.3s ease;
		}
		.button:hover {
			background-color: #555;
		}
		.product-box {
			background-color: #fff;
			box-shadow: 0 2px 5px rgba(0,0,0,0.5);
			border-radius: 5px;
			padding: 20px;
			margin: 20px;
			text-align: center;
			display: inline-block;
			width: 300px;
			height: 400px;
			position: relative;
		}
		.product-box img {
			max-width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 20px;
            }
            .product-box h3 {
            font-size: 24px;
            margin: 0;
            text-transform: uppercase;
            }
            .product-box p {
            font-size: 18px;
            margin: 10px 0;
            }
            .product-box .price {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
            }
            .product-box .button {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            }
            </style>

            </head>
            <body>
                <header>
                    <h1>My Store</h1>
                </header>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a>
                            <ul>
                                <li><a href="#">Product 1</a></li>
                                <li><a href="#">Product 2</a></li>
                                <li><a href="#">Product 3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <section>
                    <h2>Welcome to My Store</h2>
                    <p>Discover our wide range of products and find everything you need for your home.</p>
                    <a href="#" class="button">Shop Now</a>
                </section>
                <div class="product-box">
                    <img src="https://example.com/product1.jpg" alt="Product 1">
                    <h3>Product 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan nunc ac sapien vehicula iaculis. Praesent vel lectus quis nisl rutrum bibendum.</p>
                    <div class="price">$29.99</div>
                    <a href="#" class="button">Add to Cart</a>
                </div>
                <div class="product-box">
                    <img src="https://example.com/product2.jpg" alt="Product 2">
                    <h3>Product 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan nunc ac sapien vehicula iaculis. Praesent vel lectus quis nisl rutrum bibendum.</p>
                    <div class="price">$19.99</div>
                    <a href="#" class="button">Add to Cart</a>
                </div>
                <div class="product-box">
                    <img src="https://example.com/product3.jpg" alt="Product 3">
                    <h3>Product 3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan nunc ac sapien vehicula iaculis. Praesent vel lectus quis nisl rutrum bibendum.</p>
                    <div class="price">$39.99</div>
                    <a href="#" class="button">Add to Cart</a>
                </div>
                <footer>
                    <p>&copy; 2023 My Store. All Rights Reserved.</p>
                </footer>
            </body>
            </html>


