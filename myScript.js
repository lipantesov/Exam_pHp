$(document).ready(function(){
   //������� ����������� �������������
   $('#btnIn').click(function(){
      $('#teacher_name').load('autorisation.php',{login : document.getElementById('inputLogin').value
         ,password  :document.getElementById('inputPass').value});

   });
   //������� ��������� ��� ������
   $('#btn_take_group').click(function(){
         $('#groups').load('groups.php',{idAction: 'addGroup'});

   });

    //������� ��������� ������ �������������
 $('#btn_add').click(function() {
     $('#list_group input:checkbox:checked').each(function(){

         if(confirm('You want to add a group  - '+$(this).val()))
         {
             $('#groups').load('addGroupOfTeachers.php',{groupName:$(this).val()});

         }

     });
 });
//��������� ������
    $('#btn_set_evaluation').click(function(){

        $('#groups').load('groups.php',{idAction: 'setEval'});
    });
//�������� ����������
    $('#btn_show_info').click(function(){

        $('#groups').load('groups.php',{idAction: 'show'});
    });

    //������� ����������� ������
    $('#btn_select').click(function(){
        $('#list_group input:checkbox:checked').each(function(){

       $('#groups').load('setEvaluation.php',{groupName:$(this).val()});

        });
    });
    //������� ���������� ������ � ������
    $('#add_evaluation').click(function(){

        alert(document.getElementById('#tbl_set_eval'));

       $('#groups').load('add_a_note.php');
    });


    //������� ��������� ����������
    $('#btn_show').click(function(){

    });

});
