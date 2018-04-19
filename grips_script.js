$(document).ready(function(){

$("input[type='radio']").on('change', function () {
        var radioValue = $("input[name='selShow']:checked").val();

        if(radioValue=="add"){
          $("#addForm").show();
          $("#showForm").hide();
          $("#updateForm").hide();
          $("#calculateForm").hide();
        }
        else if(radioValue=="show"){
        $("#showForm").show();
        $("#addForm").hide();
        $("#updateForm").hide();
        $("#calculateForm").hide();
      }
      else if(radioValue=="calculate"){
      $("#showForm").hide();
      $("#addForm").hide();
      $("#updateForm").hide();
      $("#calculateForm").show();
    }
      else if(radioValue=="update"){
        $("#updateForm").show();
        $("#addForm").hide();
        $("#showForm").hide();
        $("#calculateForm").hide();
        }
    });
 });
