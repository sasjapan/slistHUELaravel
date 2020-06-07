<!DOCTYPE html>
<html>
<head >
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body >

<ul >
@foreach ($slists as $list )
    <li> {{$list->list_id}} {{$list->list_name }} {{$list->duedate }} </li >
@endforeach
</ul >
</body >
</html>
