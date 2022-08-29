// $(function() {
//     $('form[name="formSelect"]').submit(function(event) {
//         event.preventDefault();
        
//         var status = $("#status option:selected").val();

//         $.ajax({
//             url: "supports",
//             type: "GET",
//             data: {status: status},
//             dataType: 'json',
//             success: function(array) {
//                 console.log(array);
//             }
//         });
//     });
// })

// var status = $("#status option:selected").val();

// const selectElement = document.querySelector('.status');

// selectElement.addEventListener('change', function() {
//     console.log(this.value);
// });