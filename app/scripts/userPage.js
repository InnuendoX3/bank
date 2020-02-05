$( document ).ready(function() {            

    /**
     *  Get all users with all info each.
     *  Save each as JS object, make an array of them
     *  Use objects to fill info on page.  
     * */
    $.ajax({
    url: 'http://gohan.dev.co/bank/API/providers/users.php',
        success: function(data) {
            // data = JSON.parse(data);
            let users = [];
            let records = data.records;

            // Saves each record from API as a user object
            for (const record of records) {
                let user = {
                    id: record.id,
                    firstName: record.firstName,
                    lastName: record.lastName,
                    username: record.username,
                    phone: record.mobilephone,
                    accountId: record.account_id,
                    currency: record.currency,
                    balance: record.balance
                }
                // Push object to array for all users
                users.push(user); // Works!
            }

            /* Set Big User name and Saldo */

            // idFromLogin comes from userPage.php script
            function byUserId(u) {
                return u.id == idFromLogin;
            }

            // Get user object by ID
            let bigUser = users.find(byUserId);

            $("#name").html(`${bigUser.firstName} ${bigUser.lastName}`);
            $("#saldo").html(`${bigUser.balance} ${bigUser.currency}`);

            /* Set other users on dropdown */
            function notUserId(u) {
                return u.id != idFromLogin;
            }

            // Filter Big User from others.
            let otherUsers = users.filter(notUserId);
            console.log(otherUsers);

            for (const otherUser of otherUsers) {
                let name = `${otherUser.firstName} ${otherUser.lastName}`;
                let id = otherUser.id;
                $("#usersDropdown").append(`<option value="${id}">${name}</option>`);
            }
            
        }
    });
    
});


/* function callUserData() {
    $.ajax({
        url: `http://gohan.dev.co/bank/API/providers/user.php?id=${id}`,
        success: function(data) {
            // data = JSON.parse(data);
            console.log("entra al primerx ajax");
            console.log(data);
            // let users = data.records;
            let id = user.id;
            let name = `${data.firstName} ${data.lastName}`;
            let saldo = `${data.balance} ${data.currency}`;
            let phone = data.mobilephone

            $("#name").html(name);
            $("#saldo").html(saldo);
            console.log(saldo);                        

            // console.log(data);
        }
    });
} */