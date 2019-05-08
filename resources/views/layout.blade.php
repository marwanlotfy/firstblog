<html>
	<head>
		<title>@yield('title')</title>
		<link href="{{ asset('css/public.css')}}" media="all" rel="stylesheet" type="text/css" />
		<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			.mydiv{
				background-color:#fff
			}
            li{
                list-style:none;
                margin:20px;
                marfin-left:0px;
                font-size:20px;
                padding-left:0px;
            }
        </style>
	</head>
	<body>
		<div id="header">
			<h1>Awesome blog</h1>
		</div>
		<div id="main">
<table id="structure">
	<tr>
		<td id="navigation">
        @if(auth()->check())
        <ul>
        <li><a style="font-size:17px;" href="/post">home</a></li>
        <li><a style="font-size:17px;" href="/user/{{auth()->id()}}">profile</a></li>
        <li><a style="font-size:17px;" href="/post/create">Add Post</a></li>
        <li><a style="font-size:17px;" href="/logout">log out</a></li>
        </ul>
        @endif
		</td>
		<td id="page">
		     @yield('content')
			
		</td>
	</tr>
</table>
	</div>
		<div id="footer">Copyright 2019, </div>
	</body>
</html>