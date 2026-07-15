<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Электронная зачетка - ГБПОУ МО ЛТ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        .logo {
            font-size: 80px;
            margin-bottom: 20px;
        }
        .title {
            color: #0d47a1;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
        }
        .btn-custom {
            padding: 12px 50px;
            border-radius: 50px;
            font-weight: 600;
            margin: 5px;
            font-size: 18px;
        }
        .btn-login {
            background: #0d47a1;
            color: white;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #1565c0;
            color: white;
            transform: scale(1.05);
        }
        .footer {
            margin-top: 30px;
            color: #999;
            font-size: 14px;
        }
        .info-text {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            color: #0d47a1;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">📚</div>
        <h1 class="title">Электронная зачетная книжка</h1>
        <p class="subtitle">
            ГБПОУ МО Люберецкий техникум<br>
            имени Героя Советского Союза, лётчика-космонавта Ю.А. Гагарина
        </p>
        
        <div class="info-text">
            🔑 Вход осуществляется по выданным учётным данным
        </div>
        
        <div>
            <a href="{{ route('login') }}" class="btn btn-custom btn-login">Войти в систему</a>
        </div>
        
        <div class="footer">
            Система учета успеваемости
        </div>
    </div>
</body>
</html>