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
<!DOCTYPE html>
<!-- saved from url=(0040)https://www.instagram.com/accounts/edit/ -->
<html lang="vi" class="js logged-in ">
   <!--<![endif]-->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Chỉnh sửa trang cá nhân | Instagram</title>
      <meta name="robots" content="noimageindex">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="theme-color" content="#000000">
      <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <link rel="stylesheet" type="text/css" href="css/change_profile.css">
      <script src="./Chỉnh sửa trang cá nhân _ Instagram_files/1425767024389221" async=""></script>
      <script async="" src="./Chỉnh sửa trang cá nhân _ Instagram_files/fbevents.js.download"></script>
      <script id="facebook-jssdk" src="./Chỉnh sửa trang cá nhân _ Instagram_files/sdk.js.download"></script>
      <script type="text/javascript">
         (function() {
             var docElement = document.documentElement;
             var classRE = new RegExp('(^|\\s)no-js(\\s|$)');
             var className = docElement.className;
             docElement.className = className.replace(classRE, '$1js$2');
         })();
      </script>
      <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://www.instagram.com/static/images/ico/apple-touch-icon-76x76-precomposed.png/932e4d9af891.png">
      <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://www.instagram.com/static/images/ico/apple-touch-icon-120x120-precomposed.png/004705c9353f.png">
      <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://www.instagram.com/static/images/ico/apple-touch-icon-152x152-precomposed.png/82467bc9bcce.png">
      <link rel="apple-touch-icon-precomposed" sizes="167x167" href="https://www.instagram.com/static/images/ico/apple-touch-icon-167x167-precomposed.png/515cb4eeeeee.png">
      <link rel="apple-touch-icon-precomposed" sizes="180x180" href="https://www.instagram.com/static/images/ico/apple-touch-icon-180x180-precomposed.png/94fd767f257b.png">
      <link rel="icon" sizes="192x192" href="https://www.instagram.com/static/images/ico/favicon-192.png/b407fa101800.png">
      <link rel="mask-icon" href="https://www.instagram.com/static/images/ico/favicon.svg/9d8680ab8a3c.svg" color="#262626">
      <link rel="shortcut icon" type="image/x-icon" href="https://www.instagram.com/static/images/ico/favicon.ico/dfa85bb1fd63.ico">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/" hreflang="x-default">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=en" hreflang="en">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=fr" hreflang="fr">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=it" hreflang="it">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=de" hreflang="de">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=es" hreflang="es">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=zh-cn" hreflang="zh-cn">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=zh-tw" hreflang="zh-tw">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ja" hreflang="ja">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ko" hreflang="ko">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=pt" hreflang="pt">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=pt-br" hreflang="pt-br">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=af" hreflang="af">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=cs" hreflang="cs">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=da" hreflang="da">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=el" hreflang="el">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=fi" hreflang="fi">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=hr" hreflang="hr">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=hu" hreflang="hu">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=id" hreflang="id">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ms" hreflang="ms">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=nb" hreflang="nb">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=nl" hreflang="nl">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=pl" hreflang="pl">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ru" hreflang="ru">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=sk" hreflang="sk">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=sv" hreflang="sv">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=th" hreflang="th">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=tl" hreflang="tl">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=tr" hreflang="tr">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=hi" hreflang="hi">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=bn" hreflang="bn">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=gu" hreflang="gu">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=kn" hreflang="kn">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ml" hreflang="ml">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=mr" hreflang="mr">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=pa" hreflang="pa">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ta" hreflang="ta">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=te" hreflang="te">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ne" hreflang="ne">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=si" hreflang="si">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ur" hreflang="ur">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=vi" hreflang="vi">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=bg" hreflang="bg">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=fr-ca" hreflang="fr-ca">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=ro" hreflang="ro">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=sr" hreflang="sr">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=uk" hreflang="uk">
      <link rel="alternate" href="https://www.instagram.com/accounts/edit/?hl=zh-hk" hreflang="zh-hk">
      <script type="text/javascript" charset="utf-8" async="" crossorigin="anonymous" src="./Chỉnh sửa trang cá nhân _ Instagram_files/e2ed511c7ede.js.download"></script>
   </head>
   <body class="">
   <?php
	$rs = $mysqli->query('SELECT * FROM user WHERE userID = "'.$_SESSION["userID"].'"');
	$rs=$rs->fetch_assoc();
   
   ?>
      <span id="react-root">
         <section data-reactroot="" class="_8f735">
            <main class="_6ltyr _rnpza" role="main">
               <div class="_40h7m">
                  <ul class="_g2cyn">
                     <li><a class="_9hbou _siw05" href="editProfile.php">Chỉnh sửa trang cá nhân</a></li>
                     <li><a class="_9hbou _g6sjr" href="changeProfile.php">Đổi mật khẩu</a></li>
                     
                  </ul>
                  <article class="_e5cd3">
                     <form class="_cmoxu" action="updateProfile.php" method = "GET">
					 <div class="_ljqf0">
                        <div class="_8gpiy _f7gj7">
                           <button class="_jzgri" title="Thay đổi ảnh đại diện"><img alt="Thay đổi ảnh đại diện" class="_g5pg0" src="./Chỉnh sửa trang cá nhân _ Instagram_files/15802151_894882173982401_4189090931904872448_a.jpg"></button>
                           <input type="file" name="mediapath" class="_loq3v">
                        </div>
                        <h1 class="_4s1oa"><?php echo $rs['username'] ; ?></h1>
                     </div>
                        <div class="_9w2xs">
                           <aside class="_891mt"><label for="pepName">Tên</label></aside>
                           <div class="_lxlnj"><input type="text" class="_cm95b _qy55y" aria-required="false" id="pepName" name = "username" value="<?php echo $rs['fullname'] ; ?>"></div>
                        </div>
                        <div class="_9w2xs">
                           <aside class="_891mt"><label for="pepUsername">Tên người dùng</label></aside>
                           <div class="_lxlnj"><input type="text" class="_cm95b _qy55y" aria-required="true" id="pepUsername" name = "fullname" value="<?php echo $rs['username'] ; ?>"></div>
                        </div>
                        <div class="_9w2xs">
                           <aside class="_891mt _1w5mb"><label></label></aside>
                           <div class="_lxlnj">
                              <div class="_sdis1">
                                 <h2 class="_bgfey">Thông tin riêng tư</h2>
                              </div>
                           </div>
                        </div>
                        <div class="_9w2xs">
                           <aside class="_891mt"><label for="pepEmail">Email</label></aside>
                           <div class="_lxlnj"><input type="text" class="_cm95b _qy55y" aria-required="false" id="pepEmail" name = "email" value="<?php echo $rs['email'] ; ?>"></div>
                        </div>
                        <div class="_9w2xs">
                           <aside class="_891mt"><label for="pepGender">Giới tính</label></aside>
                           <div class="_lxlnj">
                              <div class="_9fc9f">
                                 <span class="_hfy0p _soakw coreSpriteChevronDownGrey"></span>
                                 <select id="pepGender" name = "sex" class="_2j83n _d1tp5">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                 </select>
                              </div>
                           </div>
                        </div>
						<div class="_9w2xs">
                           <aside class="_891mt"><label for="pepName">Ngày sinh</label></aside>
                           <div class="_lxlnj"><input type="date" class="_cm95b _qy55y" aria-required="false" id="dob" name = "dob" value="<?php echo $rs['dob'] ; ?>"></div>
                        </div>
                        <div class="_9w2xs">
                           <aside class="_891mt _1w5mb">
                              <label></label>
                           </aside>
                           <div class="_lxlnj">
                              <div class="_c7q5m"><span class="_7k49n"><button class="_ah57t _84y62 _frcv2 _rmr7s">Gửi</button></span></div>
                           </div>
                        </div>
                     </form>
                  </article>
               </div>
            </main>
            <nav class="_onabe _5z3y6" role="navigation">
               <div class="_fjpuc _sq03j">
                  <div class="_6v8vp">
                     <div class="_df358">
                        <div class="_jha5b">
                           <div class="_om391"><a class="_1b8in _soakw coreSpriteDesktopNavLogoAndWordmark" href="https://www.instagram.com/">Instagram</a></div>
                        </div>
                        <div class="_9pxkq _icv3j">
                           <input type="text" class="_9x5sw _qy55y" placeholder="Tìm kiếm" value="">
                           <div class="_t1y9a _98hun">
                              <div class="_etslc _1rn91"><span class="_oqxv9 coreSpriteSearchIcon"></span><span class="_9ea4j">Tìm kiếm</span></div>
                           </div>
                        </div>
                        <div class="_nhei4">
                           <div class="_pq5am">
                              <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteDesktopNavExplore" href="https://www.instagram.com/explore/">Tìm người</a></div>
                              <div class="_7smet"><a href="https://www.instagram.com/accounts/edit/#" class="_im3et _vbtk2 coreSpriteDesktopNavActivity"><span class="_soakw">Nguồn cấp hoạt động</span></a></div>
                              <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteDesktopNavProfile" href="https://www.instagram.com/_nam.naru_/">Trang cá nhân</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </nav>
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
                        <li class="_fw3ds">
                        </li>
                     </ul>
                  </nav>
                  <span class="_es4h6">© 2017 Instagram</span>
               </div>
            </footer>
            <!-- react-empty: 187 -->
            <div class="_s1xpw _44kmz">
               <div class="_plwoo"></div>
            </div>
         </section>
      </span>
      <script type="text/javascript">
         window._sharedData = {
             "activity_counts": {
                 "comment_likes": 0,
                 "comments": 0,
                 "likes": 0,
                 "relationships": 0,
                 "usertags": 0
             },
             "config": {
                 "csrf_token": "qxTbEccVOs9P0Zvt6R3dxeDN4ufVTU3L",
                 "viewer": {
                     "biography": "",
                     "external_url": null,
                     "full_name": "V\u0169 Nam",
                     "has_profile_pic": true,
                     "id": "1442578398",
                     "profile_pic_url": "https://instagram.fhan2-2.fna.fbcdn.net/t51.2885-19/s150x150/15802151_894882173982401_4189090931904872448_a.jpg",
                     "profile_pic_url_hd": "https://instagram.fhan2-2.fna.fbcdn.net/t51.2885-19/s320x320/15802151_894882173982401_4189090931904872448_a.jpg",
                     "username": "_nam.naru_"
                 }
             },
             "country_code": "VN",
             "language_code": "vi",
             "entry_data": {
                 "SettingsPages": [{
                     "form_data": {
                         "first_name": "V\u0169 Nam",
                         "last_name": "",
                         "email": "namqwer365@gmail.com",
                         "username": "_nam.naru_",
                         "phone_number": "+84 96 276 87 30",
                         "gender": 3,
                         "birthday": null,
                         "biography": "",
                         "external_url": "",
                         "chaining_enabled": true
                     }
                 }]
             },
             "gatekeepers": {
                 "bn": true,
                 "sms": true,
                 "ld": true,
                 "pl": true
             },
             "qe": {
                 "ebd": {
                     "g": "control",
                     "p": {
                         "use_new_styles": "true"
                     }
                 },
                 "bc3l": {
                     "g": "",
                     "p": {}
                 },
                 "create": {
                     "g": "launch",
                     "p": {
                         "can_delete": "true",
                         "enabled": "true"
                     }
                 },
                 "disc": {
                     "g": "",
                     "p": {}
                 },
                 "empty_profile": {
                     "g": "",
                     "p": {}
                 },
                 "feed": {
                     "g": "",
                     "p": {}
                 },
                 "gql": {
                     "g": "",
                     "p": {}
                 },
                 "su_universe": {
                     "g": "",
                     "p": {}
                 },
                 "us": {
                     "g": "",
                     "p": {}
                 },
                 "us_li": {
                     "g": "show_related_media_test_04",
                     "p": {
                         "show_related_media": "true"
                     }
                 },
                 "nav": {
                     "g": "",
                     "p": {}
                 },
                 "nav_lo": {
                     "g": "",
                     "p": {}
                 },
                 "poe": {
                     "g": "try_email_and_phone_login_test_with_text_05",
                     "p": {
                         "show_phone_or_email_text": "true",
                         "try_email_and_phone_login": "true"
                     }
                 },
                 "pm": {
                     "g": "",
                     "p": {}
                 },
                 "profile": {
                     "g": "control",
                     "p": {
                         "chaining": "true",
                         "dismiss": "false"
                     }
                 },
                 "deact": {
                     "g": "",
                     "p": {}
                 },
                 "sidecar": {
                     "g": "",
                     "p": {}
                 },
                 "ufi": {
                     "g": "test_2017_05_11",
                     "p": {
                         "is_enabled": "true"
                     }
                 },
                 "ufi_loggedout": {
                     "g": "",
                     "p": {}
                 },
                 "video": {
                     "g": "",
                     "p": {}
                 }
             },
             "hostname": "www.instagram.com",
             "display_properties_server_guess": {
                 "pixel_ratio": 1.0,
                 "viewport_width": 1366
             },
             "environment_switcher_visible_server_guess": true,
             "platform": "web",
             "probably_has_app": true,
             "show_app_install": false
         };
      </script>
      <script type="text/javascript" src="./Chỉnh sửa trang cá nhân _ Instagram_files/5cc623137186.js.download" crossorigin="anonymous"></script>
      <script type="text/javascript" src="./Chỉnh sửa trang cá nhân _ Instagram_files/f0f7bcf615d9.js.download" crossorigin="anonymous"></script>
      <script>
         ! function(f, b, e, v, n, t, s) {
             if (f.fbq) return;
             n = f.fbq = function() {
                 n.callMethod ?
                     n.callMethod.apply(n, arguments) : n.queue.push(arguments)
             };
             if (!f._fbq) f._fbq = n;
             n.push = n;
             n.loaded = !0;
             n.version = '2.0';
             n.queue = [];
             t = b.createElement(e);
             t.async = !0;
             t.src = v;
             s = b.getElementsByTagName(e)[0];
             s.parentNode.insertBefore(t, s)
         }(window,
             document, 'script', '//connect.facebook.net/en_US/fbevents.js');
         
         fbq('init', '1425767024389221');
         
         fbq('track', 'PageView');
      </script>
      <noscript>
      </noscript>
      <div id="fb-root" class=" fb_reset">
         <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div>
               <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="./Chỉnh sửa trang cá nhân _ Instagram_files/0F7S7QWJ0Ac.html" style="border: none;"></iframe>
            </div>
         </div>
         <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div></div>
         </div>
      </div>
   </body>
</html>