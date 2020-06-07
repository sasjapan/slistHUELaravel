<!DOCTYPE html >
<html >
<head >
    <meta charset="UTF-8">
    <title>Document</title>
    <link src="sass/style.css.php" rel="stylesheet"　type="text/css">
</head>
</head >
<body >
<ul >
@foreach ( $slists as $slist )
    <li><a href= "slists/{{$slist->list_id}} ">
        {{$slist->list_name}} </a></li >
    @endforeach
    </ul >
    </body >
    </html >
