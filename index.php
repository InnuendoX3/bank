<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>

        $( document ).ready(function() {
            $( "#botoncito" ).on( "click", function( event ) {
                console.log("Botoncito clicked")
                $.ajax({
                    url: 'http://gohan.dev.co/bank/API/products/users.php',
                    success: function(data) {
                        // data = JSON.parse(data);
                        let users = data.records;
                        for (const user of users) {
                            let name = `${user.firstName} ${user.lastName}`;
                            let id = user.id;
                            $("#usersDropdown").append(`<option value="${id}">${name}</option>`)
                            console.log(name);
                            
                        }
                        
                        console.log(data);
                        
                        //$("tbody").append(`<tr><td>10</td><td>${firstName}</td><td>${lastName}</td><td>${email}</td><td><button type="button" class="btn btn-danger">Remove</button></td></tr>`);
                    }
                });
            });
        });

    </script>
    <title>Document</title>
</head>
<body>
    <h3>Login as</h3>
    <select name="" id="usersDropdown">
        
    </select>
    <button id="botoncito">Hola</button>



</body>
</html>



