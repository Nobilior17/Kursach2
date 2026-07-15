<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сброс пароля - Электронная зачетка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .reset-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 50px 40px;
            max-width: 450px;
            width: 100%;
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo-icon {
            font-size: 60px;
        }
        .title {
            text-align: center;
            color: #0d47a1;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .description {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }
        .form-group .input-group {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            transition: all 0.3s;
            background: white;
        }
        .form-group .input-group:focus-within {
            border-color: #0d47a1;
            box-shadow: 0 0 0 3px rgba(13, 71, 161, 0.1);
        }
        .form-group .input-group-text {
            background: transparent;
            border: none;
            color: #999;
            padding: 12px 0 12px 15px;
        }
        .form-group .form-control {
            border: none;
            padding: 12px 15px;
            font-size: 15px;
            background: transparent;
            box-shadow: none;
        }
        .form-group .form-control:focus {
            box-shadow: none;
        }
        .form-group .form-control::placeholder {
            color: #bbb;
        }
        .btn-reset {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 71, 161, 0.3);
        }
        .btn-reset:active {
            transform: translateY(0);
        }
        .btn-reset i {
            margin-right: 10px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }
        .back-link a:hover {
            color: #0d47a1;
        }
        .back-link a i {
            margin-right: 5px;
        }
        .alert-success {
            border-radius: 12px;
            border: none;
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px 15px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success i {
            margin-right: 8px;
        }
        .alert-danger {
            border-radius: 12px;
            border: none;
            background: #fde8e8;
            color: #dc3545;
            padding: 12px 15px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-danger i {
            margin-right: 8px;
        }
        .footer {
            text-align: center;
            margin-top: 25px;
            color: #bbb;
            font-size: 12px;
        }
        .footer span {
            color: #0d47a1;
        }
        .divider {
            border-top: 2px solid #f0f0f0;
            margin: 20px 0;
        }
        .info-text {
            background: #e3f2fd;
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            color: #0d47a1;
            font-size: 13px;
            margin-bottom: 20px;
        }
        .info-text i {
            margin-right: 8px;
        }
        .is-invalid {
            border-color: #dc3545 !important;
        }
        .is-invalid:focus-within {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1) !important;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="reset-card">
        <div class="logo">
            <div class="logo-icon">🔑</div>
        </div>
        <h1 class="title">Сброс пароля</h1>
        <p class="subtitle">ГБПОУ МО Люберецкий техникум<br>имени Ю.А. Гагарина</p>

        <div class="info-text">
            <i class="bi bi-info-circle"></i> Введите email, и мы отправим ссылку для сброса пароля
        </div>

        @if(session('status'))
            <div class="alert-success">
                <i class="bi bi-check-circle"></i> {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                <i class="bi bi-exclamation-triangle"></i> 
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Электронная почта</label>
                <div class="input-group @error('email') is-invalid @enderror">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           placeholder="Введите ваш email"
                           required 
                           autofocus>
                </div>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-reset">
                <i class="bi bi-send"></i> Отправить ссылку
            </button>

            <div class="divider"></div>

            <div class="back-link">
                <a href="{{ route('login') }}">
                    <i class="bi bi-arrow-left"></i> Вернуться к входу
                </a>
            </div>
        </form>

        <div class="footer">
            Система учета успеваемости <span>❤</span>
        </div>
    </div>
</body>
</html>