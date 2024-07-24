// const accordion = document.getElementsByClassName('menu');
// 	for (i=0; i<accordion.length; i++) {
// 	accordion[i].addEventListener('click', function () {
// 		this.classList.toggle('active');
// 	})
// }

// let active = document.querySelectorAll(".sideMenu");
// 		for(let j = 0; j < active.length; j++){
// 		active[j].classList.remove("active");
// 		active[j].nextElementSibling.style.maxHeight = null; //or 0px
// 		}



// try {
// 		var acc = document.getElementsByClassName("menu");
// 		var i;

// 		for (i = 0; i < acc.length; i++) {
//       acc[i].addEventListener("click", function() {

//       var panel = this.nextElementSibling;
//       if (panel.style.maxHeight){
//         panel.style.maxHeight = panel.scrollHeight + "px";
//       panel.style.maxHeight = null;

//       } else {
//         let active = document.querySelectorAll(".sideMenu .menu.active");
//           for(let j = 0; j < active.length; j++){
//             active[j].classList.remove("active"); if(j!=i){
//               acc[j].nextElementSibling.style.maxHeight = null;
//             }
//             active[j].nextElementSibling.style.maxHeight = null;
//           }
//         this.classList.toggle("active");
//         panel.style.maxHeight = panel.scrollHeight + "px";
//       }
//       });
// 		}
//   } catch (e) {
// 	console.log(e);
//   }
$(document).ready(function(){
$('.select2-multiple').change(function(){
    var select_val = $(".select2-multiple").val();
    if ($.inArray('other body fluids', select_val) != -1)
{
    $('.body_fluids').show();
    $('.multiple_yes').hide();
    }else if($.inArray('other', select_val) != -1){
    $('.multiple_yes').show();
    $('.body_fluids').hide();
}else if($.inArray('other', select_val) != -1 && $.inArray('other body fluids', select_val) != -1){
    $('.multiple_yes').show();
    $('.body_fluids').show();
}else{
    $('.body_fluids').hide();
    $('.multiple_yes').hide();
}
// alert(select_val);
});

$(document).ready(function(){
    $('.select2-multiple').change(function(){
        var select_val = $(this).val();
        if ($.inArray('other body fluids', select_val) != -1)
        {
            $('#TextotherBodyFluids').show();
            $('#TextNaturalbiomateria').hide();
        }else if($.inArray('other', select_val) != -1){
            $('#TextotherBodyFluids').hide();
            $('#TextNaturalbiomateria').show();
        }//else if($.inArray('other', select_val) && $.inArray('Other body fluids', select_val)){
            // $('#TextNaturalbiomateria').show();
            // $('#TextotherBodyFluids').show();
        //}
        else{
            $('#TextotherBodyFluids').hide();
            $('#TextNaturalbiomateria').hide();
        }
    });
});


$('.select2-multiple').change(function(){
        var select_val = $(this).val();
        if ($.inArray('other', select_val) != -1)
    {
        $('#TextSampleCollected').show();
    }else{
        $('#TextSampleCollected').hide();
    }
    // alert(select_val);
    });
});
$(document).ready(function(){
    $('#materials_yes').click(function(){
        $('.materialsText_yes').show();
    });
    $('#materials_no').click(function(){
        $('.materialsText_yes').hide();
    });

	$('#infectious_yes').click(function(){
        $('.infectiousBox').show();
    });
    $('#infectious_no').click(function(){
        $('.infectiousBox').hide();
    });
    $('#vectors_yes').click(function(){
        $('.vectorsText_yes').show();
    });
    $('#vectors_no').click(function(){
        $('.vectorsText_yes').hide();
    });

    $('#nucleic_yes').click(function(){
        $('.nucleicText_yes').show();
    });
    $('#nucleic_no').click(function(){
        $('.nucleicText_yes').hide();
    });

    // $('#other_select').click(function(){
    //     $('#multiple_yes').show();
    // });
    // $('#multiple_biom').click(function(){
    //     $('#nucleicText_yes').hide();
    // });

});
$(document).ready(function(){
    $('#text_yes').click(function(){
		$('.wirtetext_yes').show();
    });
    $('#text_no').click(function(){
        $('.wirtetext_yes').hide();
    });
});

$(document).ready(function(){
    $('#end_user_yes').click(function(){
        $('#wirtetextEnd_user_yes').show();
    });
    $('#end_user_no').click(function(){
        $('#wirtetextEnd_user_yes').hide();
    });
});

$(document).ready(function(){
    $('#samplesExported_yes').click(function(){
        $('.TextsamplesExported').show();
    });
    $('#samplesExported_no').click(function(){
        $('.TextsamplesExported').hide();
    });
});

$(document).ready(function(){
    $('#repeat_export_yes').click(function(){
        $('.wirteRepeat_export').show();
    });
    $('#repeat_export_no').click(function(){
        $('.wirteRepeat_export').hide();
    });

	$('#research_analysis_yes').click(function(){
		$('.research_analysisSelect').show();
	});
	//$('#OtherSamplesAnalysis').click(function(){
		$('#research_analysis_no').click(function(){
		$('.research_analysisSelect').hide();
	});


});


$(document).ready(function(){
    $('#leftoverSample_yes').click(function(){
        $('.wirtetextleftover').show();
    });
    $('#leftoverSample_no').click(function(){
        $('.wirtetextleftover').hide();
    });
});

$(document).ready(function(){
    $('#nationalSecurity_yes').click(function(){
        $('.textNationalSecurity').show();
    });
    $('#nationalSecurity_no').click(function(){
        $('.textNationalSecurity').hide();
    });
});

$(document).ready(function(){
    $('#armyMilitary_yes').click(function(){
        $('.armyMilitaryText').show();
    });
    $('#armyMilitary_no').click(function(){
        $('.armyMilitaryText').hide();
    });
});

$(document).ready(function(){
    $('#biomaterial_yes').click(function(){
        $('.biomaterialText').show();
    });
    $('#biomaterial_no').click(function(){
        $('.biomaterialText').hide();
    });
});

$(document).ready(function(){
    $('#ibscRcgm_yes').click(function(){
        $('.ibscRcgmText').show();
    });
    $('#ibscRcgm_no').click(function(){
        $('.ibscRcgmText').hide();
    });
});

$(document).ready(function(){
    $('#otherBodyFluids').click(function(){
        $('#TextotherBodyFluids').show();
    });
    $('otherBodyFluids').click(function(){
        $('#TextotherBodyFluids').hide();
    });




    $('#specifyOther_end_use').click(function(){
        $('#specifyText_end_use').show();
    });
    $('.specify_purpose_end_use').click(function(){
        $('#specifyText_end_use').hide();
    });


$('#otherFurther').click(function(){
        $('.wirteotherFurther').show();
    });
    $('.retesting_purposes').click(function(){
        $('.wirteotherFurther').hide();
    });
    // $('#wirteotherFurther').hide()
    // $('#otherFurther') .click(function(){
        // $('#wirteotherFurther').show();
    // });
    // $('.retesting_purposes') .click(function(){
        // $('#wirteotherFurther').hoide();
    // });
});

$(document).ready(function () {
    $('#dtOrderExample').DataTable({
      "order": [[ 3, "desc" ]]
    });
      $('.dataTables_length').addClass('bs-select');

      $('#multiple-select').mobiscroll().select({
        inputElement: document.getElementById('my-input'),
        touchUi: false
    });
  });

//Select2
$(document).ready(function(){

    $( '.custom_list' ).select2( {
      theme: "bootstrap-5",
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      placeholder: $( this ).data( 'placeholder' ),
      closeOnSelect: false,
  } );
  });
  var acc = document.getElementsByClassName("label");
    for (let i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        for (let j = 0; j < acc.length; j++) {
        acc[j].classList.remove("active");
          if(j!=i){
            acc[j].nextElementSibling.style.maxHeight = null;
          }
        }
        this.classList.add("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
          this.classList.remove("active");
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });



    }






    // document.addEventListener("DOMContentLoaded", (event) => {
    //   console.log("DOM fully loaded and parsed");
    // });


  //   $("#slideMenu").click(function() {
  //     console.log('Button clicked!');
  //     var menu = $(".left_col");
  //     if ($(menu).is(":visible")) {
  //         $(menu).animate({width: 0}, 1000, function() {$(menu).hide();});
  //     } else {
  //         $(menu).show().animate({width: 100}, 1000);
  //     }
  // })

    document.addEventListener("DOMContentLoaded", (event) => {

      let SLIDE = document.querySelector('#slideMenu');

      SLIDE.addEventListener('click', function() {
        console.log('Button clicked!');
        alert('h1');
      });

    });

    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');
    $MENU_TOGGLE.on('click', function() {
      if ($BODY.hasClass('nav-md')) {
          $SIDEBAR_MENU.find('li.active ul').hide();
          $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
      } else {
          $SIDEBAR_MENU.find('li.active-sm ul').show();
          $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
      }

      $BODY.toggleClass('nav-md nav-sm');

      setContentHeight();
  });

  var myElement = document.getElementById('sideMenu');
  //var myElement =document.getElementsByClassName("left_col");
new SimpleBar(myElement, { autoHide: true });














