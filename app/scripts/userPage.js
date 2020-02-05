$( document ).ready(function() {            
   function callUserData() {
        $.ajax({
            url: `http://gohan.dev.co/bank/API/providers/user.php?id=${id}`,
            success: function(data) {
                // data = JSON.parse(data);
                console.log("entra al primerx ajax");
                console.log(data);
                // let users = data.records;
                let name = `${data.firstName} ${data.lastName}`;
                let saldo = `${data.balance} ${data.currency}`;

                $("#name").html(name);
                $("#saldo").html(saldo);
                console.log(saldo);                        

                // console.log(data);
            }
        });
        callAllUsers();
    }

    function callAllUsers() {
        $.ajax({
        url: 'http://gohan.dev.co/bank/API/providers/users.php',
            success: function(data) {
                // data = JSON.parse(data);
                console.log("entra al segundo ajax");
                let users = data.records;
                for (const user of users) {
                    let name = `${user.firstName} ${user.lastName}`;
                    let id = user.id;
                    $("#usersDropdown").append(`<option value="${id}">${name}</option>`)
                    // console.log(name);                        
                }
                // console.log(data);
            }
        });
    }

    callUserData();
    
});