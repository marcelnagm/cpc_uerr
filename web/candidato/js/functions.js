jQuery(function($){
  $(".cpf, #student_filters_cpf").mask("999.999.999-99");
  $(".phone").mask("(99) 9999-9999");

  if ($("#student_is_stranger").is(":checked"))
  {
    $("#student_cpf").parent().parent().parent().hide();
    $("#student_cpf").val('');
  }

  $("#student_is_stranger").click(function(){
    $("#student_cpf").parent().parent().parent().slideToggle();
    if (!$("#student_is_stranger").is(":checked"))
    {
      $("#student_cpf").val('');
    }
  });

  function giveNotes() {
    $(".average").val(function() {
      note1 = parseFloat($(this).parent().parent().children('td').children('.note1').val().replace(",","."));
      note2 = parseFloat($(this).parent().parent().children('td').children('.note2').val().replace(",","."));
      note3 = parseFloat($(this).parent().parent().children('td').children('.note3').val().replace(",","."));
      note4 = parseFloat($(this).parent().parent().children('td').children('.note4').val().replace(",","."));

      if(note1 >= 0 && note2 >= 0 && note3 >= 0) {
        average = parseFloat((note1 + note2 + note3) / 3);
        if((average >= 40 && average < 70) && note4 >= 0) 
        {
          average = ((average + note4) / 2);
        }
        if(average >= 0)
        {
          return average.toString().replace(".", ",").substr(0,5);
        } else
          return '';
      }
    });

    $(".situation").val(function() {
      hours = $("#offer_hours").val();
      absences = $(this).parent().parent().children('td').children('.absences').val();
      average = parseFloat($(this).parent().parent().children('td').children('.average').val().replace(',', '.'));

      if(average >= 0 && hours >= 0) {
        frequency = (((hours-absences)*100) / hours);
        if(frequency >= 75) 
          if(average >= 70) 
            return 'AP';
          else 
            return 'RM';
        else 
          return 'RF';
      }
      return '';
    });
  };

  $(document).on('change',function() {
    giveNotes();
  });

  $(document).ready(function() {
    giveNotes();
  });
});
$(document).ready(function(){
    $('.sf_admin_foreignkey select').selectFilter();
    $('.sf_admin_text select').selectFilter();
    $('.link-filter').attr('title','Filtro');
    $('#datepicker').datepicker(
            {
      showOn: "button",
      buttonText: "Selecione",
      changeMonth: true,
      changeYear: true
    });
    
     tinymce.init({
            selector: "#editor",
             menubar: false,
         toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        });
});