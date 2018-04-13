<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Hospital')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>

    <script> 

        //------Ask for confirmation------\\
    
        function confirmDelete()
        {
            var result = confirm('Weet je zeker dat je dit diersoort wilt verwijderen? Als er een patient bestaat met dit diersoort wordt die ook verwijderd.');
    
            if (result)
                return true;
            else 
                return false;
        }
    
        // ------Sort table------ \\
    
        function sortTable(n)
        {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchCount = 0; 
            
            table = document.getElementsByClassName('table')[0];
            switching = true;
            dir = "asc";
            
            while (switching) {
    
                switching = false;
    
                rows = table.getElementsByTagName('tr');
    
                for(i = 1; i < (rows.length - 1); i++) {
    
                    shouldSwitch = false;
    
                    x = rows[i].getElementsByTagName('td')[n]
                    y = rows[i + 1].getElementsByTagName('td')[n];
    
                    if (dir == "asc") {
    
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
    
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
    
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()){
    
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
    
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
    
                    switchCount++;
                }   else {
    
                    if (switchCount == 0 && dir == "asc") {
    
                        dir = "desc";
                        switching = true;
                    } 
                }
            }   
        }
    </script>
</body>
</html>