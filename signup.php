<?php
	session_start();
	if($_SESSION){
		header("Location: index.php");
	}
?>
<html lang="vi" class="js not-logged-in ">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Instagram</title>
    <meta name="robots" content="noimageindex">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/is.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("checkIsExist.php", { term: inputVal }).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function () {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
	<script type="text/javascript">
        $(document).ready(function () {
            $('.search-box-email input[type="email"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result-email");
                if (inputVal.length) {
                    $.get("checkIsExistE.php", { term: inputVal }).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result-email p", function () {
                $(this).parents(".search-box-email").find('input[type="email"]').val($(this).text());
                $(this).parent(".result-email").empty();
            });
        });
    </script>
    <body class="">
        <span id="react-root">
            <section data-reactroot="" class="_8f735">
                <main class="_6ltyr _rnpza" role="main">
                    <article class="_60k3m">
                        <div class="_fdj9b _3mng4">
                            <div class="_klk8w"><img class="_9gpks _5n966" src="files/aafd8c6b005d.jpg"><img class="_9gpks _mpbzm" src="files/2d9d7248af43.jpg"><img class="_9gpks" src="files/629d23a3c7b2.jpg"><img class="_9gpks" src="files/001bc33056c1.jpg"><img class="_9gpks" src="files/f5ae123ab1e2.jpg"></div>
                        </div>
                        <div class="_p8ymb">
                            <div class="_nvyyp">
                                <h1 class="_du7bh _soakw coreSpriteLoggedOutWordmark">Instagram</h1>
                                <div class="_uikn3">
                                    <!-- react-text: 123 --><!-- /react-text --><!-- react-text: 124 --><!-- /react-text -->
                                    <form class="_rwf8p" action="signupForm.php" method="POST">
										<?php
											if($_GET){
												if($_GET['error'] == "isExist"){
													echo '<div class="_ccek6 _i31zu">';
													echo 'Tài khoản hoặc Email đã được sử dụng';
													echo '</div>';
												}
											}
										?>
                                        <div class="_ccek6 _i31zu search-box"><input type="text" class="_kp5f7 _qy55y" aria-describedby="" aria-label="Tên người dùng" aria-required="true" autocapitalize="off" autocorrect="off" maxlength="30" name="username" placeholder="Tên người dùng">
											<div class="result"></div>
										</div>
                                        <div class="_ccek6 _i31zu"><input type="text" class="_kp5f7 _qy55y" aria-describedby="" aria-label="Biệt danh" aria-required="true" autocapitalize="off" autocorrect="off" maxlength="30" name="fullname" placeholder="Biệt danh"></div>
										<div class="_ccek6 _i31zu search-box-email"><input type="email" class="_kp5f7 _qy55y" aria-describedby="" aria-label="Email" aria-required="true" autocapitalize="off" autocorrect="off" maxlength="30" name="email" placeholder="Email">
											<div class="result-email"></div>
										</div>
										<div class="_ccek6 _i31zu">
                                            <input type="password" class="_kp5f7 _qy55y" aria-describedby="" aria-label="Mật khẩu" aria-required="true" autocapitalize="off" autocorrect="off" name="password" placeholder="Mật khẩu">
                                            <!--<div class="_j4ox0"><a class="_19gtn" href="https://www.instagram.com/accounts/password/reset/">Quên?</a></div>-->
                                        </div>
                                        <span class="_rz1lq _7k49n"><input type="submit" value="Đăng ký" class="_ah57t _84y62 _i46jh _rmr7s"></span>
                                    </form>
                                </div>
                            </div>
                            <div class="_nvyyp">
                                <p class="_dyp7q">
                                    <!-- react-text: 144 -->Bạn có tài khoản? <!-- /react-text --><a class="_fcn8k" href="login.php">Đăng nhập</a><!-- react-text: 146 --><!-- /react-text -->
                                </p>
                            </div>
                            <div class="_m8ogu">

                            </div>
                        </div>
                    </article>
                </main>
                <footer class="_oofbn" role="contentinfo">
                    <div class="_mhrsk _pcuq6" style="max-width: 935px;">
                        <nav class="_p1gbi" role="navigation">
                            <ul class="_fh0f2">
                                <li class="_fw3ds"><a href="https://www.instagram.com/about/us/">Giới thiệu về chúng tôi</a></li>
                                <li class="_fw3ds"><a href="https://help.instagram.com/">Hỗ trợ</a></li>
                                <li class="_fw3ds"><a href="http://blog.instagram.com/">Blog</a></li>
                                <li class="_fw3ds"><a href="https://instagram-press.com/">Báo chí</a></li>
                                <li class="_fw3ds"><a href="https://www.instagram.com/developer/">API</a></li>
                                <li class="_fw3ds"><a href="https://www.instagram.com/about/jobs/">Việc làm</a></li>
                                <li class="_fw3ds"><a href="https://www.instagram.com/legal/privacy/">Quyền riêng tư</a></li>
                                <li class="_fw3ds"><a href="https://www.instagram.com/legal/terms/">Điều khoản</a></li>
                                <li class="_fw3ds"><a href="https://www.instagram.com/explore/locations/">Thư mục</a></li>
                            </ul>
                        </nav>
                        <span class="_es4h6">© 2017 Instagram</span>
                    </div>
                </footer>
                <div class="_nl1vc _445wt _7shjj">
                    <div class="_h7ogh _97a8v"></div>
                    <div class="_hcq2b">

                    </div>
                </div>
                <div class="_s1xpw _44kmz">
                    <div class="_plwoo"></div>
                </div>
            </section>
        </span>
        <noscript>
        </noscript>
    </body>
</html>