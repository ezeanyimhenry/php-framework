<!DOCTYPE html>
<html>
<head>
    <title>My Template</title>
</head>
<body>
    <h1>{{ activity }}</h1>
    <h1>{{ userDetails.username }}</h1>
    <h1>{{ test.test1.name }}</h1>
    <h1>{{ users.0.name }}</h1>
    
    <ul>
        @foreach(users as user)
            <li>{{ user.name }}</li>
        @endforeach
    </ul>

    @if("{{ activity }}"=="activities")
    <p>true</p>
    @else
    <p>false</p>
    @endif

   
</body>
</html>
