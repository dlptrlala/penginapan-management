<html>

<head>
    <title>
        Expert in Making the Best Residence
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&amp;family=Roboto:wght@400;700&amp;display=swap"
        rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fdf6e3;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #004d40;
            margin: 0;
        }

        .header h2 {
            font-size: 28px;
            color: #00796b;
            margin: 10px 0;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .content .text {
            flex: 1;
            min-width: 300px;
        }

        .content .text p {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }

        .content .image {
            flex: 1;
            min-width: 300px;
            position: relative;
        }

        .content .image img {
            width: 100%;
            border-radius: 15px;
        }

        .content .image .overlay {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #004d40;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 16px;
        }

        .testimonial {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .testimonial p {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }

        .testimonial .author {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .testimonial .author .name {
            font-weight: bold;
        }

        .testimonial .author .position {
            color: #00796b;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>
                We are Expert in
            </h1>
            <h2>
                Making the Best Residence
            </h2>
        </div>
        <div class="content">
            <div class="text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur convallis est nisi, sit amet
                    pharetra lorem vestibulum et. Praesent interdum et mauris in viverra.
                </p>
            </div>
            <div class="image">
                <img alt="A beautiful modern house with a well-maintained lawn and a clear sky in the background"
                    src="https://placehold.co/600x400" />
                <div class="overlay">
                    <p>
                        Experienced
                        <br />
                        Over 10 Years
                    </p>
                </div>
            </div>
        </div>
        <div class="testimonial">
            <p>
                “We are the best Home Stay for you”
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur convallis est nisi, sit amet pharetra
                lorem vestibulum et.
            </p>
            <div class="author">
                <span class="name">
                    Woody Woodpecker
                </span>
                <span class="position">
                    CEO of HumaStay
                </span>
            </div>
        </div>
    </div>
</body>

</html>