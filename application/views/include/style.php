<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">

<!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

<style>
    .rate {
    height: 46px;
    padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
    span.stars, span.stars>* {
    display: inline-block;
    background: url(http://i.imgur.com/YsyS5y8.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
    }
    span.stars>*{
        max-width:80px;
        background-position: 0 0;
    }
    .dot {
        height: 20px;
        width: 20px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
    }

    /*--------------------------------------------------------------
    # General
    --------------------------------------------------------------*/
    body {
    font-family: "Poppins", sans-serif;
    color: #444444;
    }

    a {
    color: #ffb03b;
    }

    a:hover {
    color: #ffc56e;
    text-decoration: none;
    }

    h1, h2, h3, h4, h5, h6 {
    font-family: "Satisfy", sans-serif;
    }

    /*--------------------------------------------------------------
    # Back to top button
    --------------------------------------------------------------*/
    .back-to-top {
    position: fixed;
    display: none;
    right: 15px;
    bottom: 15px;
    z-index: 99999;
    }

    .back-to-top i {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    background: #ffb03b;
    color: #fff;
    transition: all 0.4s;
    }

    .back-to-top i:hover {
    background: #ffa012;
    color: #fff;
    }

    /*--------------------------------------------------------------
    # Top Bar
    --------------------------------------------------------------*/
    #topbar {
    padding: 0;
    font-size: 15px;
    height: 50px;
    transition: all 0.5s;
    color: rgba(255, 255, 255, 0.7);
    }

    #topbar.topbar-scrolled {
    top: -50px;
    }

    #topbar i {
    color: #ffb03b;
    }

    #topbar i + i {
    margin-left: 15px;
    }

    /*--------------------------------------------------------------
    # Header
    --------------------------------------------------------------*/
    #header {
    top: 50px;
    height: 70px;
    z-index: 997;
    transition: all 0.5s;
    padding: 10px 0;
    }

    #header.header-scrolled {
    top: 0;
    background: rgba(26, 24, 22, 0.85);
    }

    #header .logo h1 {
    font-size: 28px;
    margin: 0;
    line-height: 1;
    font-weight: 400;
    letter-spacing: 3px;
    }

    #header .logo h1 a, #header .logo h1 a:hover {
    color: #fff;
    text-decoration: none;
    }

    #header .logo img {
    padding: 0;
    margin: 0;
    max-height: 40px;
    }

    @media (max-width: 992px) {
    #header {
        top: 0;
        background: rgba(26, 24, 22, 0.85);
    }
    }

    /*--------------------------------------------------------------
    # Navigation Menu
    --------------------------------------------------------------*/
    /* Desktop Navigation */
    .nav-menu, .nav-menu * {
    margin: 0;
    padding: 0;
    list-style: none;
    }

    .nav-menu > ul > li {
    position: relative;
    white-space: nowrap;
    float: left;
    }

    .nav-menu a {
    display: block;
    position: relative;
    color: white;
    padding: 9px 14px;
    transition: 0.3s;
    font-size: 15px;
    font-weight: 500;
    font-family: "Poppins", sans-serif;
    }

    .nav-menu a:hover, .nav-menu .active > a, .nav-menu li:hover > a {
    color: #ffb03b;
    text-decoration: none;
    }

    .nav-menu .book-a-table a {
    background: #ffb03b;
    color: #fff;
    border-radius: 50px;
    margin: 0 0 0 20px;
    padding: 10px 25px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: 0.3s;
    }

    .nav-menu .book-a-table a:hover {
    background: #ffa012;
    color: #fff;
    }

    .nav-menu .drop-down ul {
    display: block;
    position: absolute;
    left: 0;
    top: calc(100% + 30px);
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    padding: 10px 0;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: ease all 0.3s;
    }

    .nav-menu .drop-down:hover > ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
    }

    .nav-menu .drop-down li {
    min-width: 180px;
    position: relative;
    }

    .nav-menu .drop-down ul a {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 500;
    text-transform: none;
    color: #433f39;
    }

    .nav-menu .drop-down ul a:hover, .nav-menu .drop-down ul .active > a, .nav-menu .drop-down ul li:hover > a {
    color: #ffb03b;
    }

    .nav-menu .drop-down > a:after {
    content: "\ea99";
    font-family: IcoFont;
    padding-left: 5px;
    }

    .nav-menu .drop-down .drop-down ul {
    top: 0;
    left: calc(100% - 30px);
    }

    .nav-menu .drop-down .drop-down:hover > ul {
    opacity: 1;
    top: 0;
    left: 100%;
    }

    .nav-menu .drop-down .drop-down > a {
    padding-right: 35px;
    }

    .nav-menu .drop-down .drop-down > a:after {
    content: "\eaa0";
    font-family: IcoFont;
    position: absolute;
    right: 15px;
    }

    @media (max-width: 1366px) {
    .nav-menu .drop-down .drop-down ul {
        left: -90%;
    }
    .nav-menu .drop-down .drop-down:hover > ul {
        left: -100%;
    }
    .nav-menu .drop-down .drop-down > a:after {
        content: "\ea9d";
    }
    }

    /* Mobile Navigation */
    .mobile-nav-toggle {
    position: fixed;
    right: 15px;
    top: 15px;
    z-index: 9998;
    border: 0;
    background: none;
    font-size: 24px;
    transition: all 0.4s;
    outline: none !important;
    line-height: 1;
    cursor: pointer;
    text-align: right;
    }

    .mobile-nav-toggle i {
    color: #fff;
    }

    .mobile-nav {
    position: fixed;
    top: 55px;
    right: 15px;
    bottom: 15px;
    left: 15px;
    z-index: 9999;
    overflow-y: auto;
    background: #fff;
    transition: ease-in-out 0.2s;
    opacity: 0;
    visibility: hidden;
    border-radius: 10px;
    padding: 10px 0;
    }

    .mobile-nav * {
    margin: 0;
    padding: 0;
    list-style: none;
    }

    .mobile-nav a {
    display: block;
    position: relative;
    color: #433f39;
    padding: 10px 20px;
    font-weight: 500;
    outline: none;
    }

    .mobile-nav a:hover, .mobile-nav .active > a, .mobile-nav li:hover > a {
    color: #ffb03b;
    text-decoration: none;
    }

    .mobile-nav .book-a-table a {
    background: #ffb03b;
    color: #fff;
    border-radius: 50px;
    margin: 0 0 0 20px;
    padding: 10px 25px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: 0.3s;
    display: inline-block;
    }

    .mobile-nav .book-a-table a:hover {
    background: #ffa012;
    color: #fff;
    }

    .mobile-nav .drop-down > a:after {
    content: "\ea99";
    font-family: IcoFont;
    padding-left: 10px;
    position: absolute;
    right: 15px;
    }

    .mobile-nav .active.drop-down > a:after {
    content: "\eaa1";
    }

    .mobile-nav .drop-down > a {
    padding-right: 35px;
    }

    .mobile-nav .drop-down ul {
    display: none;
    overflow: hidden;
    }

    .mobile-nav .drop-down li {
    padding-left: 20px;
    }

    .mobile-nav-overly {
    width: 100%;
    height: 100%;
    z-index: 9997;
    top: 0;
    left: 0;
    position: fixed;
    background: rgba(39, 37, 34, 0.6);
    overflow: hidden;
    display: none;
    transition: ease-in-out 0.2s;
    }

    .mobile-nav-active {
    overflow: hidden;
    }

    .mobile-nav-active .mobile-nav {
    opacity: 1;
    visibility: visible;
    }

    .mobile-nav-active .mobile-nav-toggle i {
    color: #fff;
    }

    /*--------------------------------------------------------------
    # Hero Section
    --------------------------------------------------------------*/
    #hero {
    width: 100%;
    height: 100vh;
    background-color: rgba(39, 37, 34, 0.8);
    overflow: hidden;
    padding: 0;
    }

    #hero .carousel-item {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    }

    #hero .carousel-item::before {
    content: '';
    background-color: rgba(12, 11, 10, 0.5);
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    }

    #hero .carousel-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    }

    #hero .carousel-content {
    text-align: center;
    }

    #hero h2 {
    color: #fff;
    margin-bottom: 30px;
    font-size: 48px;
    font-weight: 700;
    }

    #hero h2 span {
    color: #ffb03b;
    }

    #hero p {
    width: 80%;
    -webkit-animation-delay: 0.4s;
    animation-delay: 0.4s;
    margin: 0 auto 30px auto;
    color: #fff;
    }

    #hero .carousel-inner .carousel-item {
    transition-property: opacity;
    background-position: center top;
    }

    #hero .carousel-inner .carousel-item,
    #hero .carousel-inner .active.carousel-item-left,
    #hero .carousel-inner .active.carousel-item-right {
    opacity: 0;
    }

    #hero .carousel-inner .active,
    #hero .carousel-inner .carousel-item-next.carousel-item-left,
    #hero .carousel-inner .carousel-item-prev.carousel-item-right {
    opacity: 1;
    transition: 0.5s;
    }

    #hero .carousel-inner .carousel-item-next,
    #hero .carousel-inner .carousel-item-prev,
    #hero .carousel-inner .active.carousel-item-left,
    #hero .carousel-inner .active.carousel-item-right {
    left: 0;
    transform: translate3d(0, 0, 0);
    }

    #hero .carousel-control-prev, #hero .carousel-control-next {
    width: 10%;
    opacity: 1;
    }

    #hero .carousel-control-next-icon, #hero .carousel-control-prev-icon {
    background: none;
    font-size: 36px;
    line-height: 1;
    width: auto;
    height: auto;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50px;
    padding: 10px;
    transition: 0.3s;
    color: rgba(255, 255, 255, 0.5);
    }

    #hero .carousel-control-next-icon:hover, #hero .carousel-control-prev-icon:hover {
    background: rgba(255, 255, 255, 0.2);
    color: rgba(255, 255, 255, 0.8);
    }

    #hero .carousel-indicators li {
    cursor: pointer;
    }

    #hero .btn-menu, #hero .btn-book {
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: inline-block;
    padding: 12px 30px;
    border-radius: 50px;
    transition: 0.5s;
    line-height: 1;
    margin: 0 10px;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.8s;
    color: #fff;
    border: 2px solid #ffb03b;
    }

    #hero .btn-menu:hover, #hero .btn-book:hover {
    background: #ffb03b;
    color: #fff;
    }

    @media (max-width: 768px) {
    #hero h2 {
        font-size: 28px;
    }
    }

    @media (min-width: 1024px) {
    #hero p {
        width: 50%;
    }
    #hero .carousel-control-prev, #hero .carousel-control-next {
        width: 5%;
    }
    }

    /*--------------------------------------------------------------
    # Sections General
    --------------------------------------------------------------*/
    section {
    padding: 60px 0;
    }

    .section-bg {
    background-color: white;
    }

    .section-title {
    text-align: center;
    padding-bottom: 30px;
    }

    .section-title h2 {
    margin: 15px 0 0 0;
    font-size: 32px;
    font-weight: 700;
    color: #5f5950;
    }

    .section-title h2 span {
    color: #ffb03b;
    }

    .section-title p {
    margin: 15px auto 0 auto;
    font-weight: 300;
    }

    @media (min-width: 1024px) {
    .section-title p {
        width: 50%;
    }
    }

    /*--------------------------------------------------------------
    # About
    --------------------------------------------------------------*/
    .about {
    background: #fffaf3;
    }

    .about .content {
    padding: 0 80px;
    }

    .about .content h3 {
    font-weight: 400;
    font-size: 34px;
    color: #5f5950;
    }

    .about .content h4 {
    font-size: 20px;
    font-weight: 700;
    margin-top: 5px;
    }

    .about .content p {
    font-size: 15px;
    color: #848484;
    }

    .about .content ul {
    list-style: none;
    padding: 0;
    }

    .about .content ul li + li {
    margin-top: 15px;
    }

    .about .content ul li {
    position: relative;
    padding-left: 26px;
    }

    .about .content ul i {
    font-size: 20px;
    color: #ffb03b;
    position: absolute;
    left: 0;
    top: 2px;
    }

    .about .content p:last-child {
    margin-bottom: 0;
    }

    .about .video-box {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    min-height: 400px;
    position: relative;
    }

    .about .play-btn {
    width: 94px;
    height: 94px;
    background: radial-gradient(#ffb03b 50%, rgba(255, 176, 59, 0.4) 52%);
    border-radius: 50%;
    display: block;
    position: absolute;
    left: calc(50% - 47px);
    top: calc(50% - 47px);
    overflow: hidden;
    }

    .about .play-btn::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-40%) translateY(-50%);
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 15px solid #fff;
    z-index: 100;
    transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }

    .about .play-btn::before {
    content: '';
    position: absolute;
    width: 120px;
    height: 120px;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
    -webkit-animation: pulsate-btn 2s;
    animation: pulsate-btn 2s;
    -webkit-animation-direction: forwards;
    animation-direction: forwards;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-timing-function: steps;
    animation-timing-function: steps;
    opacity: 1;
    border-radius: 50%;
    border: 5px solid rgba(255, 176, 59, 0.7);
    top: -15%;
    left: -15%;
    background: rgba(198, 16, 0, 0);
    }

    .about .play-btn:hover::after {
    border-left: 15px solid #ffb03b;
    transform: scale(20);
    }

    .about .play-btn:hover::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-40%) translateY(-50%);
    width: 0;
    height: 0;
    border: none;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 15px solid #fff;
    z-index: 200;
    -webkit-animation: none;
    animation: none;
    border-radius: 0;
    }

    @media (max-width: 1024px) {
    .about .content, .about .accordion-list {
        padding-left: 0;
        padding-right: 0;
    }
    }

    @media (max-width: 992px) {
    .about .content {
        padding-top: 30px;
    }
    .about .accordion-list {
        padding-bottom: 30px;
    }
    }

    @-webkit-keyframes pulsate-btn {
    0% {
        transform: scale(0.6, 0.6);
        opacity: 1;
    }
    100% {
        transform: scale(1, 1);
        opacity: 0;
    }
    }

    @keyframes pulsate-btn {
    0% {
        transform: scale(0.6, 0.6);
        opacity: 1;
    }
    100% {
        transform: scale(1, 1);
        opacity: 0;
    }
    }

    /*--------------------------------------------------------------
    # Whu Us
    --------------------------------------------------------------*/
    .why-us .box {
    padding: 50px 30px;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    transition: all ease-in-out 0.3s;
    }

    .why-us .box span {
    display: block;
    font-size: 28px;
    font-weight: 700;
    color: #ffcf88;
    }

    .why-us .box h4 {
    font-size: 24px;
    font-weight: 600;
    padding: 0;
    margin: 20px 0;
    color: #6c665c;
    }

    .why-us .box p {
    color: #aaaaaa;
    font-size: 15px;
    margin: 0;
    padding: 0;
    }

    .why-us .box:hover {
    background: #ffb03b;
    padding: 30px 30px 70px 30px;
    box-shadow: 10px 15px 30px rgba(0, 0, 0, 0.18);
    }

    .why-us .box:hover span, .why-us .box:hover h4, .why-us .box:hover p {
    color: #fff;
    }

    /*--------------------------------------------------------------
    # Menu Section
    --------------------------------------------------------------*/
    .menu #menu-flters {
    padding: 0;
    margin: 0 auto 0 auto;
    list-style: none;
    text-align: center;
    border-radius: 50px;
    }

    .menu #menu-flters li {
    cursor: pointer;
    display: inline-block;
    padding: 8px 16px 10px 16px;
    font-size: 14px;
    font-weight: 500;
    line-height: 1;
    color: #444444;
    margin: 0 3px 10px 3px;
    transition: all ease-in-out 0.3s;
    background: #fff;
    border: 2px solid #ffb03b;
    border-radius: 50px;
    }

    .menu #menu-flters li:hover, .menu #menu-flters li.filter-active {
    color: #fff;
    background: #ffb03b;
    }

    .menu #menu-flters li:last-child {
    margin-right: 0;
    }

    .menu .menu-content {
    margin-top: 30px;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    position: relative;
    }

    .menu .menu-content::after {
    content: "......................................................................"
    "...................................................................."
    "....................................................................";
    position: absolute;
    left: 20px;
    right: 0;
    top: -4px;
    z-index: 1;
    color: #dad8d4;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    }

    .menu .menu-content a {
    padding-right: 10px;
    background: #fff;
    position: relative;
    z-index: 3;
    font-weight: 700;
    color: #ff9b08;
    }

    .menu .menu-content span {
    background: #fff;
    position: relative;
    z-index: 3;
    padding: 0 10px;
    font-weight: 600;
    }

    .menu .menu-ingredients {
    font-style: italic;
    font-size: 14px;
    font-family: "Comic Neue", sans-serif;
    color: #948c81;
    }

    /*--------------------------------------------------------------
    # Specials
    --------------------------------------------------------------*/
    .specials {
    overflow: hidden;
    }

    .specials .nav-tabs {
    border: 0;
    }

    .specials .nav-link {
    border: 0;
    padding: 12px 15px 12px 0;
    transition: 0.3s;
    color: #433f39;
    border-radius: 0;
    border-right: 2px solid #e8e7e4;
    font-weight: 600;
    font-size: 15px;
    }

    .specials .nav-link:hover {
    color: #ffb03b;
    }

    .specials .nav-link.active {
    color: #ffb03b;
    border-color: #ffb03b;
    }

    .specials .tab-pane.active {
    -webkit-animation: fadeIn 0.5s ease-out;
    animation: fadeIn 0.5s ease-out;
    }

    .specials .details h3 {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #433f39;
    }

    .specials .details p {
    color: #777777;
    }

    .specials .details p:last-child {
    margin-bottom: 0;
    }

    @media (max-width: 992px) {
    .specials .nav-link {
        border: 0;
        padding: 15px;
    }
    .specials .nav-link.active {
        color: #fff;
        background: #ffb03b;
    }
    }

    /*--------------------------------------------------------------
    # Events
    --------------------------------------------------------------*/
    .events {
    background: url(../img/events-bg.jpg) center center no-repeat;
    background-size: cover;
    position: relative;
    }

    .events::before {
    content: '';
    background-color: rgba(12, 11, 10, 0.8);
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    }

    .events .section-title h2 {
    color: #fff;
    }

    .events .container {
    position: relative;
    }

    @media (min-width: 1024px) {
    .events {
        background-attachment: fixed;
    }
    }

    .events .events-carousel {
    background: rgba(255, 255, 255, 0.08);
    padding: 30px;
    }

    .events .event-item {
    color: #fff;
    }

    .events .event-item h3 {
    font-weight: 600;
    font-size: 26px;
    color: #ffb03b;
    }

    .events .event-item .price {
    font-size: 26px;
    font-family: "Poppins", sans-serif;
    font-weight: 700;
    margin-bottom: 15px;
    }

    .events .event-item .price span {
    border-bottom: 2px solid #ffb03b;
    }

    .events .event-item ul {
    list-style: none;
    padding: 0;
    }

    .events .event-item ul li {
    padding-bottom: 10px;
    }

    .events .event-item ul i {
    font-size: 20px;
    padding-right: 4px;
    color: #ffb03b;
    }

    .events .event-item p:last-child {
    margin-bottom: 0;
    }

    .events .owl-nav, .events .owl-dots {
    margin-top: 5px;
    text-align: center;
    }

    .events .owl-dot {
    display: inline-block;
    margin: 0 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #ddd !important;
    }

    .events .owl-dot.active {
    background-color: #ffb03b !important;
    }

    @media (min-width: 992px) {
    .events .testimonial-item p {
        width: 80%;
    }
    }

    /*--------------------------------------------------------------
    # Book A Table
    --------------------------------------------------------------*/
    .book-a-table .php-email-form {
    width: 100%;
    box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    padding: 30px;
    background: #fff;
    }

    .book-a-table .php-email-form .form-group {
    padding-bottom: 8px;
    }

    .book-a-table .php-email-form .validate {
    display: none;
    color: red;
    margin: 0 0 15px 0;
    font-weight: 400;
    font-size: 13px;
    }

    .book-a-table .php-email-form .error-message {
    display: none;
    color: #fff;
    background: #ed3c0d;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    }

    .book-a-table .php-email-form .sent-message {
    display: none;
    color: #fff;
    background: #18d26e;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    }

    .book-a-table .php-email-form .loading {
    display: none;
    background: #fff;
    text-align: center;
    padding: 15px;
    }

    .book-a-table .php-email-form .loading:before {
    content: "";
    display: inline-block;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    margin: 0 10px -6px 0;
    border: 3px solid #18d26e;
    border-top-color: #eee;
    -webkit-animation: animate-loading 1s linear infinite;
    animation: animate-loading 1s linear infinite;
    }

    .book-a-table .php-email-form input, .book-a-table .php-email-form textarea {
    border-radius: 0;
    box-shadow: none;
    font-size: 14px;
    }

    .book-a-table .php-email-form input {
    height: 44px;
    }

    .book-a-table .php-email-form textarea {
    padding: 10px 12px;
    }

    .book-a-table .php-email-form button[type="submit"] {
    background: #ffb03b;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;
    }

    .book-a-table .php-email-form button[type="submit"]:hover {
    background: #ffa012;
    }

    /*--------------------------------------------------------------
    # Gallery
    --------------------------------------------------------------*/
    .gallery {
    padding-bottom: 0;
    }

    .gallery .gallery-item {
    overflow: hidden;
    border-right: 3px solid #fff;
    border-bottom: 3px solid #fff;
    }

    .gallery .gallery-item img {
    transition: all ease-in-out 0.4s;
    }

    .gallery .gallery-item:hover img {
    transform: scale(1.1);
    }

    /*--------------------------------------------------------------
    # Chefs
    --------------------------------------------------------------*/
    .chefs {
    background: url("../img/chefs-bg.jpg") center center no-repeat;
    background-size: cover;
    padding: 60px 0;
    position: relative;
    }

    .chefs::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.8);
    z-index: 9;
    }

    .chefs .container {
    position: relative;
    z-index: 10;
    }

    .chefs .member {
    text-align: center;
    margin-bottom: 80px;
    position: relative;
    }

    .chefs .member .pic {
    overflow: hidden;
    }

    .chefs .member .member-info {
    position: absolute;
    bottom: -80px;
    left: 20px;
    right: 20px;
    background: #fff;
    padding: 20px 0;
    color: #433f39;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: max-height 0.5s ease-in-out;
    }

    .chefs .member h4 {
    font-weight: 500;
    margin-bottom: 10px;
    font-size: 16px;
    color: #6c665c;
    position: relative;
    padding-bottom: 10px;
    font-family: "Poppins", sans-serif;
    }

    .chefs .member h4::after {
    content: '';
    position: absolute;
    display: block;
    width: 50px;
    height: 1px;
    background: #ffcf88;
    bottom: 0;
    left: calc(50% - 25px);
    }

    .chefs .member span {
    font-style: italic;
    display: block;
    font-size: 13px;
    }

    .chefs .member .social {
    margin-top: 15px;
    }

    .chefs .member .social a {
    transition: color 0.3s;
    color: #7a7368;
    }

    .chefs .member .social a:hover {
    color: #ffb03b;
    }

    .chefs .member .social i {
    font-size: 16px;
    margin: 0 2px;
    }

    @media (max-width: 992px) {
    .chefs .member {
        margin-bottom: 110px;
    }
    }

    @media (min-width: 1024px) {
    .chefs {
        background-attachment: fixed;
    }
    }

    /*--------------------------------------------------------------
    # Testimonials
    --------------------------------------------------------------*/
    .testimonials {
    padding: 80px 0;
    background: url("../img/testimonials-bg.jpg") no-repeat;
    background-position: center center;
    background-size: cover;
    position: relative;
    }

    .testimonials::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: rgba(12, 11, 10, 0.7);
    }

    .testimonials .section-header {
    margin-bottom: 40px;
    }

    .testimonials .testimonial-item {
    text-align: center;
    color: #fff;
    }

    .testimonials .testimonial-item .testimonial-img {
    width: 100px;
    border-radius: 50%;
    border: 6px solid rgba(255, 255, 255, 0.15);
    margin: 0 auto;
    }

    .testimonials .testimonial-item h3 {
    font-size: 20px;
    font-weight: bold;
    margin: 10px 0 5px 0;
    color: #fff;
    font-family: "Poppins", sans-serif;
    }

    .testimonials .testimonial-item h4 {
    font-size: 14px;
    color: #ddd;
    margin: 0 0 15px 0;
    font-family: "Comic Neue", sans-serif;
    }

    .testimonials .testimonial-item .stars {
    color: #ffb03b;
    margin-bottom: 10px;
    }

    .testimonials .testimonial-item .quote-icon-left, .testimonials .testimonial-item .quote-icon-right {
    color: rgba(255, 255, 255, 0.4);
    font-size: 26px;
    }

    .testimonials .testimonial-item .quote-icon-left {
    display: inline-block;
    left: -5px;
    position: relative;
    }

    .testimonials .testimonial-item .quote-icon-right {
    display: inline-block;
    right: -5px;
    position: relative;
    top: 10px;
    }

    .testimonials .testimonial-item p {
    font-style: italic;
    margin: 0 auto 15px auto;
    color: #eee;
    }

    .testimonials .owl-nav, .testimonials .owl-dots {
    margin-top: 5px;
    text-align: center;
    }

    .testimonials .owl-dot {
    display: inline-block;
    margin: 0 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.4) !important;
    }

    .testimonials .owl-dot.active {
    background-color: #ffb03b !important;
    }

    @media (min-width: 1024px) {
    .testimonials {
        background-attachment: fixed;
    }
    }

    @media (min-width: 992px) {
    .testimonials .testimonial-item p {
        width: 80%;
    }
    }

    /*--------------------------------------------------------------
    # Contact
    --------------------------------------------------------------*/
    .contact .info-wrap {
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    padding: 30px;
    }

    .contact .info {
    background: #fff;
    }

    .contact .info i {
    font-size: 20px;
    color: #ffb03b;
    float: left;
    width: 44px;
    height: 44px;
    background: #fff6e8;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    transition: all 0.3s ease-in-out;
    }

    .contact .info h4 {
    padding: 0 0 0 60px;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #433f39;
    font-family: "Poppins", sans-serif;
    }

    .contact .info p {
    padding: 0 0 0 60px;
    margin-bottom: 0;
    font-size: 14px;
    color: #7a7368;
    }

    .contact .info:hover i {
    background: #ffb03b;
    color: #fff;
    }

    .contact .php-email-form {
    width: 100%;
    box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    padding: 30px;
    background: #fff;
    }

    .contact .php-email-form .form-group {
    padding-bottom: 8px;
    }

    .contact .php-email-form .validate {
    display: none;
    color: red;
    margin: 0 0 15px 0;
    font-weight: 400;
    font-size: 13px;
    }

    .contact .php-email-form .error-message {
    display: none;
    color: #fff;
    background: #ed3c0d;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    }

    .contact .php-email-form .sent-message {
    display: none;
    color: #fff;
    background: #18d26e;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    }

    .contact .php-email-form .loading {
    display: none;
    background: #fff;
    text-align: center;
    padding: 15px;
    }

    .contact .php-email-form .loading:before {
    content: "";
    display: inline-block;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    margin: 0 10px -6px 0;
    border: 3px solid #18d26e;
    border-top-color: #eee;
    -webkit-animation: animate-loading 1s linear infinite;
    animation: animate-loading 1s linear infinite;
    }

    .contact .php-email-form input, .contact .php-email-form textarea {
    border-radius: 0;
    box-shadow: none;
    font-size: 14px;
    }

    .contact .php-email-form input {
    height: 44px;
    }

    .contact .php-email-form textarea {
    padding: 10px 12px;
    }

    .contact .php-email-form button[type="submit"] {
    background: #ffb03b;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;
    }

    .contact .php-email-form button[type="submit"]:hover {
    background: #ffa012;
    }

    @-webkit-keyframes animate-loading {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }

    @keyframes animate-loading {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }

    /*--------------------------------------------------------------
    # Footer
    --------------------------------------------------------------*/
    #footer {
    background: #35322d;
    color: #fff;
    font-size: 14px;
    text-align: center;
    padding: 30px 0;
    }

    #footer h3 {
    font-size: 36px;
    font-weight: 700;
    color: #ffb03b;
    position: relative;
    padding: 0;
    margin: 0 0 15px 0;
    }

    #footer p {
    font-size: 15;
    font-style: italic;
    padding: 0;
    margin: 0 0 40px 0;
    }

    #footer .social-links {
    margin: 0 0 40px 0;
    }

    #footer .social-links a {
    font-size: 18px;
    display: inline-block;
    background: #46423b;
    color: #fff;
    line-height: 1;
    padding: 8px 0;
    margin-right: 4px;
    border-radius: 50%;
    text-align: center;
    width: 36px;
    height: 36px;
    transition: 0.3s;
    }

    #footer .social-links a:hover {
    background: #ffb03b;
    }

    #footer .copyright {
    margin: 0 0 5px 0;
    }

    #footer .credits {
    font-size: 13px;
    }

</style>