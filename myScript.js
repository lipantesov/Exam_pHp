$(document).ready(function(){
   $('#btnIn').click(function(){
      $('#teacher_name').load('autorisation.php',{login : document.getElementById('inputLogin').value
         ,password  :document.getElementById('inputPass').value});

   });

});
