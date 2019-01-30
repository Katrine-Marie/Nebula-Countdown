.shortcodeModal {
	position:fixed;
	top:0;bottom:0;left:0;right:0;
	background:rgba(0,0,0,.5);
	z-index:9999;
}

.modalContent {
	position:fixed;
	top:50%;
	left:50%;
	transform:translateX(-50%) translateY(-50%);

	padding:20px;
	background:#fff;
	border:1px solid #aaa;
	box-shadow:0 0 100px #000;
}

.shortcodeClose {
	cursor:pointer;

	position:absolute;
	z-index:99999;
	top:-8px;right:-8px;
	padding:6px 8px;
	font-size:22px;
	font-weight:bold;
	color:#aaa;
	background:#fff;
	border-radius:50%;
	border:1px solid #aaa;
}

.shortcodeClose:hover, .shortcodeClose:focus {
	background:#aaa;
	color:#fff;
}
