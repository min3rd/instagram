<?php
	include("config.inc.php");
	session_start();
	if($_SESSION["userID"] == null){
		header("Location: login.php");	
	}else{
		$rs = $mysqli->query('SELECT * FROM user WHERE userID = "'.$_SESSION["userID"].'"');
		if ($rs->num_rows > 0) {
			
		} else {
			session_destroy();
			header("Location: login.php");
		}
	}
	
?>
<html lang="vi" class="js logged-in ">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Instagram</title>
    <meta name="robots" content="noimageindex">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/is.css">

    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //khai báo nút submit form
            var submit = $("button[type='submit']");

            //khi thực hiện kích vào nút Login
            submit.click(function () {
                //khai báo các biến
                var userID = $("input[name='userIDupload']").val(); //lấy giá trị input tài khoản
                var caption = $("input[name='caption']").val(); //lấy giá trị input mật khẩu
                var image = $("input[name='upload']").val();

                //lay tat ca du lieu trong form	login
                var data = $('form#formUpload').serialize();
                //su dung ham $.ajax()
                $.ajax({
                    type: 'POST', //kiểu post
                    url: 'updateStatus.php', //gửi dữ liệu sang trang submit.php
                    data: data,
                    success: function (data) {
                        if (data == 'false') {
                            alert('Đã xảy ra lỗi. Thử lại sau.');
                        } else {
                            $('#content').html(data);
                        }
                    }
                });
                return false;
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("livesearch.php", { term: inputVal }).done(function (data) {
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
</head>
<body class="">
    <span id="react-root">
        <section data-reactroot="" class="_8f735">
            <main class="_6ltyr _rnpza" role="main">
                <section class="_jx516">
                    <div class="_qj7yb">
                        <div>
                            <div class="wrapper">
                                <article class="_h2d1o _j5hrx _pieko  _es1du _rgrbt" style="margin-bottom: 50px">
                                    <form action="updateStatus.php" method="POST" enctype="multipart/form-data">
                                        <header class="_s6yvg">
                                            <input type="hidden" name="userIDupload" value="<?php echo $_SESSION["userID"];?>">
                                            <input type="text" class="_7uiwk _qy55y" aria-label="Bạn đang nghĩ gì..." placeholder="Bạn đang nghĩ gì..." value="" name="caption">
                                            <div class="_bm6zw">
                                                <!-- react-empty: 741 -->
                                            </div>
                                            <input class="_9q0pi " style="border-style: solid;" type="submit" value="Đăng">
                                        </header>
                                        <div>
                                            <input id="fileUpload" class="_7uiwk _qy55y" type="file" name="fileToUpload" id="fileToUpload">
                                            <div id="image-holder"></div>

                                        </div>
                                    </form>
                                </article>
                            </div>
                            <div class="wrapper">
                                <ul id="results"><!-- results appear here --></ul>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <nav class="_onabe _5z3y6 menu" role="navigation">
                <div class="_fjpuc _sq03j">
                    <div class="_6v8vp">
                        <div class="_df358">
                            <div class="_jha5b">
                                <div class="_om391"><a class="_1b8in _soakw coreSpriteMobileNavHomeActive" href="index.php">Instagram</a></div>
                            </div>
                            <div class="_9pxkq _icv3j">
                                <div class="search-box">
                                    <input type="text" class="_9x5sw _qy55y" autocomplete="off" placeholder="Tìm kiếm" />
                                    <div class="result"></div>
                                </div>
                            </div>
                            <div class="_nhei4">
                                <div class="_pq5am">
                                    <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteMobileNavSearchInactive" href="search.php">Tìm người</a></div>
                                    <div class="_7smet"><a href="#" class="_im3et _vbtk2 coreSpriteDesktopNavActivity"><span class="_soakw"></span></a></div>
                                    <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteDesktopNavProfile" href="profile.php?userID=<?php echo $_SESSION["userID"]?>">Trang cá nhân</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <footer class="_oofbn" role="contentinfo">
                <div class="_mhrsk _np0yb" style="max-width: 600px;">
                    <nav class="_p1gbi" role="navigation">
                        <ul class="_fh0f2">
                            <li class="_fw3ds"><a href="#">Giới thiệu về chúng tôi</a></li>
                            <li class="_fw3ds"><a href="#">Hỗ trợ</a></li>
                            <li class="_fw3ds"><a href="#">Blog</a></li>
                            <li class="_fw3ds"><a href="#">Báo chí</a></li>
                            <li class="_fw3ds"><a href="#">API</a></li>
                            <li class="_fw3ds"><a href="#">Việc làm</a></li>
                            <li class="_fw3ds"><a href="#">Quyền riêng tư</a></li>
                            <li class="_fw3ds"><a href="#">Điều khoản</a></li>
                            <li class="_fw3ds"><a href="">Thư mục</a></li>
                        </ul>
                    </nav>
                    <span class="_es4h6">© <?php echo date('Y');?> Instagram</span>
                </div>
            </footer>
            <!-- react-empty: 967 -->
            <div class="_s1xpw _44kmz">
                <div class="_plwoo"></div>
            </div>
        </section>
    </span>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript">
        var track_page = 1; //track user scroll as page number, right now page number is 1
        var loading = false; //prevents multiple loads

        load_contents(track_page); //initial content load

        $(window).scroll(function () { //detect page scroll
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
                track_page++; //page number increment
                load_contents(track_page); //load content
            }
        });
        //Ajax load function
        function load_contents(track_page) {
            if (loading == false) {
                loading = true;  //set loading flag on
                $('.loading-info').show(); //show loading animation
                $.post('fetch_pages.php', { 'page': track_page }, function (data) {
                    loading = false; //set loading flag off once the content is loaded
                    if (data.trim().length == 0) {
                        //notify user if nothing to load
                        $('.loading-info').show();
                        return;
                    }
                    $('.loading-info').hide(); //hide loading animation once data is received
                    $("#results").append(data); //append data into #results element

                }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?
                    alert(thrownError); //alert with HTTP error
                })
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#fileUpload").on('change', function () {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image _icyx7"
                                }).appendTo(image_holder);
                            }
                            $("#image-holder").addClass('_jjzlb');
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        //alert("This browser does not support FileReader.");
                    }
                } else {
                    //alert("Pls select only images");
                }
            });
        });
    </script>
    <script type="text/javascript">
        // Create a clone of the menu, right next to original.
        $('.menu').addClass('original').clone().insertAfter('.menu').addClass('cloned').css('position', 'fixed').css('top', '0').css('margin-top', '0').css('z-index', '500').removeClass('original').hide();

        scrollIntervalID = setInterval(stickIt, 10);


        function stickIt() {

            var orgElementPos = $('.original').offset();
            orgElementTop = orgElementPos.top;

            if ($(window).scrollTop() >= (orgElementTop)) {
                // scrolled past the original position; now only show the cloned, sticky element.

                // Cloned element should always have same left position and width as original element.
                orgElement = $('.original');
                coordsOrgElement = orgElement.offset();
                leftOrgElement = coordsOrgElement.left;
                widthOrgElement = orgElement.css('width');
                $('.cloned').css('left', leftOrgElement + 'px').css('top', 0).css('width', widthOrgElement).show();
                $('.original').css('visibility', 'hidden');
            } else {
                // not scrolled past the menu; only show the original menu.
                $('.cloned').hide();
                $('.original').css('visibility', 'visible');
            }
        }
    </script>
    <script type="text/javascript">
        function showResult(str) {
            if (str.length == 0) {
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("livesearch").innerHTML = this.responseText;
                    document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                }
            }
            xmlhttp.open("GET", "livesearch.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>