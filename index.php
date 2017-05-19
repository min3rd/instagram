<?php
	session_start();
	if($_SESSION["userID"] == NULL){
		header("Location: login.php");
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
	<style>
		.wrapper{width: 500px;margin: 0 auto;font-family: Georgia, "Times New Roman", Times, serif;}
		.wrapper > ul#results li{margin-bottom: 1px;background: #f9f9f9;padding: 20px;list-style: none;}
		.loading-info{text-align:center;}
	</style>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{	
		//khai báo nút submit form
		var submit   = $("button[type='submit']");
		
		//khi thực hiện kích vào nút Login
		submit.click(function()
		{
			//khai báo các biến
			var userID = $("input[name='userID']").val(); //lấy giá trị input tài khoản
			var caption = $("input[name='caption']").val(); //lấy giá trị input mật khẩu
			var image =$("input[name='upload']").val();
			
			//lay tat ca du lieu trong form	login
			var data = $('form#formUpload').serialize();
			//su dung ham $.ajax()
			$.ajax({
			type : 'POST', //kiểu post
			url  : 'updateStatus.php', //gửi dữ liệu sang trang submit.php
			data : data,
			success :  function(data)
				   {						
						if(data == 'false')
						{
							alert('Đã xảy ra lỗi. Thử lại sau.');
						}else{
							$('#content').html(data);
						}
				   }
			});
			return false;
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
					<section class="_jveic _dsvln">
                                <div class="_9f9pr">
									<article class="_h2d1o _j5hrx _pieko">
										<form class="_k3t69" action="updateStatus.php" method="POST" ip="formUpload">
											<input type ="hidden" name ="userID" value="<?php echo $_SESSION["userID"];?>">
											<input type="text" class="_7uiwk _qy55y" aria-label="Bạn đanng nghĩ gì..." placeholder="Bạn đanng nghĩ gì..." value="" name="caption">
											<div class="_bm6zw">
												<!-- react-empty: 741 -->
											</div>
											<div class="browse-wrap">
												<div class="title">Choose a file to upload</div>
												<input type="file" name="upload" class="upload" title="Choose a file to upload">
											</div>
											<span class="upload-path"></span>
										</form>
									</article>
								</div>
                    </section>
					 <div class="wrapper">
							<ul id="results"><!-- results appear here --></ul>
							<div class="_sgy7u">
								<div class="_jf5s3 _c7qti"></div>
							 </div>
						</div>
                     </div>
                  </div>
               </section>
            </main>
            <nav class="_onabe _5z3y6" role="navigation">
               <div class="_fjpuc _sq03j">
                  <div class="_6v8vp">
                     <div class="_df358">
                        <div class="_jha5b">
                           <div class="_om391"><a class="_1b8in _soakw coreSpriteDesktopNavLogoAndWordmark" href="https://uncover.cf">Instagram</a></div>
                        </div>
                        <div class="_9pxkq _icv3j">
                           <input type="text" class="_9x5sw _qy55y" placeholder="Tìm kiếm" value="">
                        </div>
                        <div class="_nhei4">
                           <div class="_pq5am">
                              <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteDesktopNavExplore" href="https://www.instagram.com/explore/">Tìm người</a></div>
                              <div class="_7smet"><a href="https://www.instagram.com/#" class="_im3et _vbtk2 coreSpriteDesktopNavActivity"><span class="_soakw">Nguồn cấp hoạt động</span></a></div>
                              <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteDesktopNavProfile" href="https://www.instagram.com/9melodyy/">Trang cá nhân</a></div>
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
                  <span class="_es4h6">© <?php echo date('YYYY');?> Instagram</span>
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
		var loading  = false; //prevents multiple loads

		load_contents(track_page); //initial content load

		$(window).scroll(function() { //detect page scroll
			if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
				track_page++; //page number increment
				load_contents(track_page); //load content	
			}
		});		
		//Ajax load function
		function load_contents(track_page){
			if(loading == false){
				loading = true;  //set loading flag on
				$('.loading-info').show(); //show loading animation 
				$.post( 'fetch_pages.php', {'page': track_page}, function(data){
					loading = false; //set loading flag off once the content is loaded
					if(data.trim().length == 0){
						//notify user if nothing to load
						$('.loading-info').show();
						return;
					}
					$('.loading-info').hide(); //hide loading animation once data is received
					$("#results").append(data); //append data into #results element
				
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					alert(thrownError); //alert with HTTP error
				})
			}
		}
		</script>
		<script type="text/javascript">
			var span = document.getElementsByClassName('upload-path');
			// Button
			var uploader = document.getElementsByName('upload');
			// On change
			for( item in uploader ) {
			  // Detect changes
			  uploader[item].onchange = function() {
				// Echo filename in span
				span[0].innerHTML = this.files[0].name;
			  }
			}
		</script>
   </body>
</html>