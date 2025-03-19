
<!DOCTYPE html> 
<html lang="en"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <title><?php echo isset($title) ? $title : 'Trắc nghiệm Online'; ?></title>     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">     
   
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        
        /* Wrapper chính để đảm bảo footer ở dưới cùng */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        main {
            flex: 1 0 auto; /* Cho phép nội dung mở rộng */
            padding: 20px 0;
        }
        
        footer {
            background-color: #186c79;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            flex-shrink: 0; /* Ngăn footer co lại */
            width: 100%;
            margin-top: auto; /* Đẩy footer xuống dưới cùng */
        }
        
        footer p {
            color: #f1f1f1;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 0;
        }
        
        /* Đảm bảo sweetalert không ảnh hưởng đến layout */
        .swal2-container {
            position: fixed;
            z-index: 9999;
        }
    </style>
</head> 
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(45, 178, 198)">
            <div class="container">
                <a class="navbar-brand" href="../Page/home.php">Sinh viên</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-3">
                        <?php if (isset($_COOKIE['userName'])): ?>
                            <!-- Hiển thị khi người dùng đã đăng nhập -->
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Xin chào, <?php echo $_COOKIE['userName']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/PHP_BaoCao/index.php?controller=user&action=logout">Đăng xuất</a>
                            </li>

                        <?php else: ?>
                            <!-- Hiển thị khi người dùng chưa đăng nhập -->
                            <li class="nav-item">
                                <a class="nav-link" href="/PHP_BaoCao/index.php?controller=user&action=login">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/PHP_BaoCao/View/Page/register.php">Đăng ký</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="container">
        <?php include $content; ?>
    </main>
    
    <footer>
        <p>&copy; 2025 .Hello World.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 có thể được thêm vào đây nếu cần -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body> 
</html>