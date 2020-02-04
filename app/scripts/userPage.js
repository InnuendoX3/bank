$( document ).ready(function() {            
   $.ajax({
       url: `http://gohan.dev.co/bank/API/providers/user.php?id=${id}`,
       success: function(data) {
            // data = JSON.parse(data);
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
});