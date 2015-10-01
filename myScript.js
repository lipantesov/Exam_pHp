$(document).ready(function(){
   //Функция авторизации преподавателя
   $('#btnIn').click(function(){
      $('#teacher_name').load('autorisation.php',{login : document.getElementById('inputLogin').value
         ,password  :document.getElementById('inputPass').value});

   });
   //Функция загружает все группы
   $('#btn_take_group').click(function(){


         $('#groups').load('groups.php');
   });

});
