$( document ).ready(function() {     
    
    /* Get all users' name and ID to login dropdown */
    $.ajax({
        url: 'http://gohan.dev.co/bank/API/providers/users.php',
        success: function(data) {
            // data = JSON.parse(data);
           let users = data.records;
           for (const user of users) {
               let name = `${user.firstName} ${user.lastName}`;
               let id = user.id;

               // Insert each user name into dropdown
               $("#usersDropdown").append(`<option value="${id}">${name}</option>`)
               // console.log(name);                        
           }
           // console.log(data);
       }
   });
});