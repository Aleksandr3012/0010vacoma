<!DOCTYPE html>
<div class="d-none">
	<?php
		if(!empty($_POST)){
				ini_set( 'display_errors', 1 );
				require __DIR__ . '/vendor/autoload.php';
				// $to='trifectahealthnyc@gmail.com';
				$mail = new PHPMailer(true);
				$mail->IsMail();
				$mail->IsHTML(true);
	
				$mail->Priority = '1';
				$mail->Encoding = 'base64' ;
				$mail->CharSet = 'utf-8';
	
		///от кого письмо
				$mail->setFrom('info@info.com');
	
				$mail->addAddress('wol1414@gmail.com');
				// $mail->addAddress('spike.mgn@gmail.com');
				// $mail->addAddress('grouplend@mail.ru');
				// $mail->addAddress('rocketsstat@yandex.ru');
				// $mail->addAddress('455203@mail.ru');
	
	
		//Субъект
				$mail->Subject = 'Заявка с сайта groupv.ru (Верстаки)';
	
				$time = date('d.m.Y в H:i');
				$html = '
	
		<table style="width: 100%;">';
				if (!empty($_POST['order'])) {
						$html .= ' <tr style="background-color: #f8f8f8;">  <td style="padding: 10px; border: #e9e9e9 1px solid;">Вид формы:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['order'] . '</b></td></tr>';
				}
	
				
	
				if (!empty($_POST['name'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;">Имя:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['name'] . '</b></td></tr>';
				}
	
				if (!empty($_POST['tel'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> Телефон:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['tel'] . '</b></td></tr>';
				}
				
				if (!empty($_POST['email'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> Email:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['email'] . '</b></td></tr>';
				}
				
				if (!empty($_POST['whatsapp'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> Whatsapp:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['whatsapp'] . '</b></td></tr>';
				}
				
				if (!empty($_POST['viber'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> Viber:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['viber'] . '</b></td></tr>';
				}
				 
				if (!empty($_POST['textarea'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> Текст сообщения:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['textarea'] . '</b></td></tr>';
				}
	
	
				if (!empty($_POST['type-company'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> Вид компании: </td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . implode(", ",$_POST['type-company']) .  '</b></td>';
				}
	
				if (!empty($_POST['utm_source'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;">utm_source:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['utm_source'] . '</b></td>';
				}
	
				if (!empty($_POST['utm_term'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> utm_term:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['utm_term'] . '</b></td>';
				}
				
				if (!empty($_POST['utm_medium'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> utm_medium:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['utm_medium'] . '</b></td>';
				}
				if (!empty($_POST['utm_campaign'])) {
						$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> utm_campaign:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_POST['utm_campaign'] . '</b></td>';
				}
	
			 
	
				$html .= ' <tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;">  Время отправки:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $time . '</b></td>
					<tr style="background-color: #f8f8f8;"> <td style="padding: 10px; border: #e9e9e9 1px solid;"> IP:</td>   <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $_SERVER['REMOTE_ADDR'] . '</b></td> 
		</table>
		';
				$mail->Body = $html;
	
				$uploaddir = __DIR__ . '/upload/';
	
				// if ($_FILES['file']['tmp_name']) {
				// 		$mail->addAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);
				// }
	
		// if ($_FILES['file2']['tmp_name']) {
		//  $mail->addAttachment($_FILES['file2']['tmp_name'],$_FILES['file2']['name']);
		// }
	
		//send the message, check for errors
			 
				if (!$mail->send()) {
		//        echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
		//        echo "Message sent!";
				}
				if (isset($uploadfile))unlink($uploadfile);
				if (isset($uploadfile2))unlink($uploadfile2);
	 
		}
		?>
	
</div>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Cпасибо</title>
		<meta name="description" content="Проектирование и изготовление редукторной техники на основании конструкторской документации Заказчиком, а также по собственному инжинирингу">
		<meta name="description">
		<meta name="Keywords" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/png" href="img/favicon/favicon.png"><meta name="format-detection" content="telephone=no">
		<link rel="image_src" href="http://vakoma.ru/img/soc-logo.png">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="Вакома РУС">
		<meta property="og:title" content="Вакома РУС, проектирование и изготовление редукторной техники">
		<meta property="og:description" content="Проектирование и изготовление редукторной техники на основании конструкторской документации Заказчиком, а также по собственному инжинирингу">
		<meta property="og:url" content="https://vakoma.ru">
		<meta property="og:locale" content="ru_RU">
		<meta property="og:image" content="img/og-image.jpg">
		<meta property="og:image:width" content="968">
		<meta property="og:image:height" content="504">
		<!-- Custom Browsers Color-->
		<meta name="theme-color" content="#3361d8">
		<link rel="stylesheet" href="libs/slick-carousel/slick/slick.css"/>
		<link rel="stylesheet" href="libs/@fancyapps/fancybox/jquery.fancybox.min.css"/>
		<link rel="stylesheet" href="css/main.min.css"/>
	</head>
	<body><!--[if lt IE 11]><p   class="browsehappy container">К сожалению, вы используете устаревший браузер. Пожалуйста, <a href="http://browsehappy.com/" target="_blank">обновите ваш браузер</a>, чтобы улучшить производительность, качество отображаемого материала и повысить безопасность.</p><![endif]-->
		<div class="main-wrapper">
			<div class="menu-mobile menu-mobile--js d-lg-none">
				<div class="toggle-menu-mobile toggle-menu-mobile--js"><span></span>
				</div>
				<div class="menu-mobile__inner">
								<ul class="menu-mobile__nav" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
									<li class="menu-mobile__item" itemprop="item"><a class="menu-mobile__link" href="index.html" itemprop="url"> <span>Главная</span></a>
									</li>
									<li class="menu-mobile__item" itemprop="item"><a class="menu-mobile__link" href="tehnicheskie-vozmojnosti.html" itemprop="url"> <span>Технические возможности</span></a>
									</li>
									<li class="menu-mobile__item" itemprop="item"><a class="menu-mobile__link" href="novosti-2021.html" itemprop="url"> <span>Новости</span></a>
									</li>
									<li class="menu-mobile__item dropdown" itemprop="item">
										<div class="menu-mobile__link"> <span>Редукторы и&nbsp;мультипликаторы</span>
											<ul class="drop">
												<li class="drop__item"><a class="drop__link" href="tyajelonagrujennie-reduktori.html" itemprop="url">Тяжелонагруженные редукторы</a>
												</li>
												<li class="drop__item"><a class="drop__link" href="turboreduktori.html" itemprop="url">Мультипликаторы (турборедукторы)</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="menu-mobile__item" itemprop="item"><a class="menu-mobile__link" href="zubchatie-peredachi.html" itemprop="url"> <span>Зубчатые передачи и&nbsp;комплектующие</span></a>
									</li>
									<li class="menu-mobile__item" itemprop="item"><a class="menu-mobile__link text-warning" href="importozameshenie.html" itemprop="url"><span>Импортозамещение</span></a>
									</li>
									<li class="menu-mobile__item" itemprop="item"><a class="menu-mobile__link" href="kontakti.html" itemprop="url"> <span>Контакты</span></a>
									</li>
								</ul>
					<div class="text-right"></div>
				</div>
			</div>
			<!--  мобильное меню-->
			<!-- start topLine-->
			<div class="topLine" id="topLine">
				<div class="container">
					<div class="row">
						<div class="topLine__mob col-auto align-self-center d-block d-lg-none">
							<div class="toggle-menu-mobile toggle-menu-mobile--js d-lg-none"><span></span>
							</div>
						</div>
						<div class="topLine__col col col-md-7"><a class="topLine__logo" href="/">
							<div class="topLine__pferde-wrap"><img class="res-i" src="img/@2x/pferde.png" alt="вакома"/>
							</div>
							<div class="topLine__vacoma"><img class="res-i" src="img/@2x/logo.png" alt="вакома"/>
								<p>Ваше&nbsp;Ателье&nbsp;в&nbsp;области&nbsp;редукторостроения</p>
							</div></a>
						</div>
						<div class="col-3 d-none d-lg-block align-self-center"><a class="topLine__write" href="mailto:office@vakoma.ru">
							<svg class="icon icon-mail ">
								<use xlink:href="img/svg/sprite.svg#mail"></use>
							</svg><span class="topLine__mail"><strong>Пишите нам:</strong> office@vakoma.ru</span></a>
						</div>
						<div class="col-2 text-right d-none d-lg-block">
							<div class="topLine__contacts"><a class="topLine__nuber" href="tel:8(3519)23-54-00">8 (3519) <strong>23-54-00</strong></a><a class="topLine__call link-modal" href="#modal-call">Заказать звонок</a>
								<div class="topLine__messengers"><a href="https://t.me/vakomarus" target="_blank"><img src="img/telegram.png" alt="Вакома РУС"/></a><a href="viber://chat?number=79123030333" target="_blank"><img src="img/viber.png" alt="Вакома РУС"/></a><a href="https://wa.me/79123030333" target="_blank"><img class="whatsapp" src="img/whatsapp.png" alt="Вакома РУС"/></a>
								</div>
							</div>
						</div>
						<div class="col d-block d-lg-none align-self-center"><a class="topLine__tel" href="tel:8(3519)23-54-00">
							<svg class="icon icon-phone ">
								<use xlink:href="img/svg/sprite.svg#phone"></use>
							</svg></a>
						</div>
					</div>
				</div>
			</div>
			<!-- end topLine-->
			<!-- start top-nav-->
			<div class="top-nav block-with-lazy d-none d-lg-block">
				<div class="container">
								<ul class="top-nav__nav" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
									<li class="top-nav__item" itemprop="item"><a class="top-nav__link" href="index.html" itemprop="url"> <span>Главная</span></a>
									</li>
									<li class="top-nav__item" itemprop="item"><a class="top-nav__link" href="tehnicheskie-vozmojnosti.html" itemprop="url"> <span>Технические возможности</span></a>
									</li>
									<li class="top-nav__item" itemprop="item"><a class="top-nav__link" href="novosti-2021.html" itemprop="url"> <span>Новости</span></a>
									</li>
									<li class="top-nav__item dropdown" itemprop="item">
										<div class="top-nav__link"> <span>Редукторы и&nbsp;мультипликаторы</span>
											<ul class="drop">
												<li class="drop__item"><a class="drop__link" href="tyajelonagrujennie-reduktori.html" itemprop="url">Тяжелонагруженные редукторы</a>
												</li>
												<li class="drop__item"><a class="drop__link" href="turboreduktori.html" itemprop="url">Мультипликаторы (турборедукторы)</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="top-nav__item" itemprop="item"><a class="top-nav__link" href="zubchatie-peredachi.html" itemprop="url"> <span>Зубчатые передачи и&nbsp;комплектующие</span></a>
									</li>
									<li class="top-nav__item" itemprop="item"><a class="top-nav__link text-warning" href="importozameshenie.html" itemprop="url"><span>Импортозамещение</span></a>
									</li>
									<li class="top-nav__item" itemprop="item"><a class="top-nav__link" href="kontakti.html" itemprop="url"> <span>Контакты</span></a>
									</li>
								</ul>
				</div>
			</div>
			<!-- end top-nav-->
			<div class="container">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
						<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="#" itemprop="item"><span itemprop="name">Вернуться на сайт </span>
								<meta itemprop="position"></a></li>
					</ol>
				</nav>
			</div>
			<div class="text-block text-block text-block--thanks">
				<div class="container">
					<?php
						$name="";
						if(isset($_POST['name'])) {
								$name= $_POST['name']
									?> 
								<h1 class=" h2 text-center"><?php echo $name; ?>, спасибо, мы&nbsp;приняли вашу заявку!</h1>
								<?php
							}
							else{	?> 
								<h2  class=" h2 text-center">Cпасибо, мы&nbsp;приняли вашу заявку!</h2>
									<?php
							}	?> 
					
					<div class="h4 text-center">Наш специалист перезвонит и ответит на ваши вопросы.</div>
					<div class="h4 text-center">Удачного дня!</div>
				</div>
			</div>
			<!-- /.text-block-->
			<div class="to-top-js"><img src="img/to-top.png" alt="to-top"/></div>
			<footer class="footer block-with-lazy">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="row justify-content-between">
								<div class="col-md"><a class="footer__logo" href="index.html"><span class="footer__img-wrap"><img src="img/logo-2.png" alt="вакома логотип"/></span><span class="footer__logo-title">Ваше Ателье в области редукторостроения</span></a>
									<p>Копирование материала сайта только с&nbsp;письменного&nbsp;согласия собственника сайта</p>
									<div class="footer__secondary-menu d-none d-md-block">
										<ul>
											<li><a href="privacy-policy.pdf">Политика конфиденциальности</a></li>
											<li><a href="processing-conditions.pdf">Пользовательское соглашение</a></li>
											<li><a href="sitemap.xml">Карта сайта</a></li>
										</ul>
									</div>
								</div>
								<div class="footer__coll col-md">
									<div class="footer__menu">
										<ul>
											<li><a href="index.html">Главная</a></li>
											<li><a href="our-company.html">О компании</a></li>
											<li><a href="tehnicheskie-vozmojnosti.html">Технические возможности</a></li>
											<li><a href="tyajelonagrujennie-reduktori.html">Тяжелонагруженные редукторы</a></li>
											<li><a href="turboreduktori.html">Мультипликаторы (турборедукторы)</a></li>
											<li><a href="zubchatie-peredachi.html">Зубчатые передачи и комплектующие</a></li>
											<li><a class="text-warning" href="importozameshenie.html">Импортозамещение </a></li>
											<li><a href="kontakti.html">Контакты</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg">
							<div class="row">
								<div class="footer__col col-md-6 col-xl-7">
									<div class="footer__write">Пишите нам:<a href="mailto:office@vakoma.ru">office@vakoma.ru</a>
									</div>
								</div>
								<div class="col-md-6 col-xl-5">
									<div class="footer__contacts"><a class="footer__number" href="tel:8(3519)23-54-00" target="_blank">8 (3519) <strong>23-54-00</strong></a><a class="footer__call link-modal" href="#modal-call">Заказать звонок</a>
										<div class="footer__messengers"><a href="https://t.me/vakomarus" target="_blank"><img src="img/telegram.png" alt="Вакома РУС"/></a><a href="viber://chat?number=79123030333" target="_blank"><img src="img/viber.png" alt="Вакома РУС"/></a><a href="https://wa.me/79123030333" target="_blank"><img class="whatsapp" src="img/whatsapp.png" alt="Вакома РУС"/></a>
										</div>
									</div>
								</div>
								<div class="footer__col col-md-6">
									<div class="footer__secondary-menu d-block d-md-none">
										<ul>
											<li><a href="privacy-policy.pdf">Политика конфиденциальности</a></li>
											<li><a href="processing-conditions.pdf">Пользовательское соглашение</a></li>
											<li><a href="sitemap.xml">Карта сайта</a></li>
										</ul>
									</div>
									<div class="footer__text">Создание и&nbsp;продвижение  сайта: <a href="https://simonov.marketing" target="_blank"> Simonov.Marketing</a> 
									</div>
								</div>
								<div class="col-md-6"><a class="develop-link" href="https://simonov.marketing" target="_blank"><span class="develop-link__panel"><img class="img-1" src="img/svg/hand.svg" alt="studiobars"/><img class="img-2" src="img/svg/logo-text.svg" alt="studiobars"/></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<div class="d-none">
			<div class="form-wrap modal-win modal-win--call modal-form" id="modal-call">
				<form>
					<input type="hidden" name="example-input-field"/>
					<input class="order" type="hidden" name="order" value="Заявка  с сайта"/>
					<input class="utm_source" type="hidden" name="utm_source"/>
					<input class="utm_term" type="hidden" name="utm_term"/>
					<input class="utm_medium" type="hidden" name="utm_medium"/>
					<input class="utm_campaign" type="hidden" name="utm_campaign"/> 
					<div class="form-wrap__top-title">Для оформления заказа оставьте ваши контакты
					</div>
					<input type="hidden" name="formwithtime" value="formwithtime"/>
					<div class="form-wrap__input-wrap form-group">
						<label><span class="form-wrap__title">Как к вам обращаться?</span><input class="form-wrap__input form-control" type="text" placeholder="Иван" name="name"/>
						</label>
					</div>
					<!-- +e.input-wrap-->
					<div class="tabs">
						<div class="form-wrap__group">
							<div class="form-wrap__group-title">Как с вами связаться?
							</div>
							<div class="tabs__caption">
								<div class="tabs__btn active">
									<svg class="icon icon-telephone ">
										<use xlink:href="img/svg/sprite.svg#telephone"></use>
									</svg>Звонок 
								</div>
								<div class="tabs__btn">
									<svg class="icon icon-whatsapp ">
										<use xlink:href="img/svg/sprite.svg#whatsapp"></use>
									</svg>WhatsApp
								</div>
								<div class="tabs__btn">
									<svg class="icon icon-viber ">
										<use xlink:href="img/svg/sprite.svg#viber"></use>
									</svg>Viber
								</div>
							</div>
						</div>
						<div class="tabs__wrap">
							<div class="tabs__content active">
								<div class="form-wrap__input-wrap form-group">
									<label><span class="form-wrap__title">Введите телефон:</span><input class="form-wrap__input form-control" type="tel" placeholder="+7 (900) 444-44-44" name="tel" required="required"/>
									</label>
								</div>
								<!-- +e.input-wrap-->
							</div>
							<div class="tabs__content">
								<div class="form-wrap__input-wrap form-group">
									<label><span class="form-wrap__title">Введите whatsapp:</span><input class="form-wrap__input form-control" type="tel" placeholder="+7 (900) 444-44-44" name="whatsapp"/>
									</label>
								</div>
								<!-- +e.input-wrap-->
							</div>
							<div class="tabs__content">
								<div class="form-wrap__input-wrap form-group">
									<label><span class="form-wrap__title">Введите viber:</span><input class="form-wrap__input form-control" type="tel" placeholder="+7 (900) 444-44-44" name="viber"/>
									</label>
								</div>
								<!-- +e.input-wrap-->
							</div>
						</div>
					</div>
					<div class="form-wrap__input-wrapper">
						<div class="form-wrap__comment form-wrap__comment--js text-center">Задайте вопрос, если есть
						</div>
						<div class="form-wrap__toggle-block form-wrap__toggle-block--js">
							<div class="form-wrap__input-wrap form-group"><textarea class="form-wrap__input form-control" placeholder="Текст сообщения" name="textarea"></textarea>
							</div>
							<!-- +e.input-wrap-->
						</div>
					</div>
					<button class="form-wrap__btn" type="submit">Заказать звонок
					</button>
					<div class="form-wrap__polite text-secondary"> Нажимая на&nbsp;кнопку, вы&nbsp;даете согласие на&nbsp;обработку своих персональных данных и&nbsp;соглашаетесь с&nbsp;<a class="tdu text-secondary" href="privacy-policy.pdf" target="_blank">Политикой конфиденциальности</a>
					</div>
				</form>
			</div>
			<!-- #modal-call-->
		</div>
		<!-- modal-->
		<script src="js/lazy.js"></script>
		<script src="libs/jquery/jquery.min.js"></script>
		<!-- полифил для picture-->
		<script src="libs/picturefill/picturefill.min.js"></script>
		<!-- полифил для object-fit-->
		<script src="libs/object-fit-images/ofi.min.js"></script>
		<!-- modal libs-->
		<script src="libs/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
		<!-- modal libs-->
		<!-- slider libs-->
		<script src="libs/slick-carousel/slick/slick.min.js"></script>
		<!-- /slider libs-->
		<!-- for svg libs-->
		<script src="libs/svg4everybody/svg4everybody.min.js"></script>
		<!-- /for svg libs-->
		<script src="libs/inputmask/jquery.inputmask.min.js"></script>
		<script src="js/common.js"></script><svg class="invisible">
<linearGradient id="primary-gradient" gradientTransform="rotate(60)">
<stop offset="50%" stop-color="#1c5398"/>
<stop offset="100%" stop-color="#16437c"/>
</linearGradient>
</svg><!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(61451359, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/61451359" style="position:absolute; left:-9999px;" alt="Вакома РУС" /></div></noscript> <!-- /Yandex.Metrika counter -->
	</body>
</html>