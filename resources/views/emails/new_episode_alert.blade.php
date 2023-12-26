<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Episode Alert</title>
    <style>
        .email-container {
            width: 100%;
            background-color: black;
            padding: 0;
            margin: 0;
        }

        .email-content {
            width: 100%;
            max-width: 400px;
            border: 1px solid #ddd;
            padding: 16px;
            margin: auto;
        }

        .email-content h2 {
            color: #FBBF24;
            font-size: 24px;
        }

        .email-content p {
            color: #F3F4F6;
            font-size: 16px;
        }

        .email-content strong {
            color: #10B981;
        }

        .email-image {
            border-radius: 50%;
            width: 250px;
            height: 250px;
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-content">
        <h2>Hi <span>{{ $userName }}</span></h2>

        <p>New episode of <strong>{{ $showTitle }}</strong> is just available!</p>

        <p>Enjoy watching!</p>

        <img src={{$image}} alt="img" class="email-image"/>
    </div>
</div>
</body>
</html>
