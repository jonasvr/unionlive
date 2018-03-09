var calculator = new Calculator()
$(function() {

  $( "#audio" ).click(function() {
    unselectAll();
    $(this).addClass("type-active");
    $("#artwork-input").hide();
    $("#audio-input").show();
    calculator.typeUpdate(TypeEnum.audio);
    $.scrollify.next();
  });

  $( "#visual" ).click(function() {
    unselectAll();
    $(this).addClass("type-active");
    $("#artwork-input").show();
    $("#audio-input").hide();
    calculator.typeUpdate(TypeEnum.visual);
    $.scrollify.next();
  });

  $( "#audiovisual" ).click(function() {
    unselectAll();
    $(this).addClass("type-active");
    calculator.typeUpdate(TypeEnum.audiovisual);
    $.scrollify.next();
  });


  $( "#day" ).click(function() {
    calculator.periodUpdate("day");
    $.scrollify.next();
  });

  $( "#week" ).click(function() {
    calculator.periodUpdate("week");
    $.scrollify.next();
  });

  $( "#month" ).click(function() {
    calculator.periodUpdate("month");
    $.scrollify.next();
  });

  $( "#season" ).click(function() {
    calculator.periodUpdate("season");
    $.scrollify.next();
  });

  $( "#semester" ).click(function() {
    calculator.periodUpdate("semester");
    $.scrollify.next();
  });

  $( "#year" ).click(function() {
    calculator.periodUpdate("year");
    $.scrollify.next();
  });


  $( "#ten" ).click(function() {
    calculator.durationUpdate("ten");
    $.scrollify.next();
  });

  $( "#fifteen" ).click(function() {
    calculator.durationUpdate("fifteen");
    $.scrollify.next();
  });

  $( "#twenty" ).click(function() {
    calculator.durationUpdate("twenty");
    $.scrollify.next();
  });

  $( "#twentyfive" ).click(function() {
    calculator.durationUpdate("twentyfive");
    $.scrollify.next();
  });

  $( "#thirty" ).click(function() {
    calculator.durationUpdate("thirty");
    $.scrollify.next();
  });

  function unselectAll() {
    $(".type").each(function() {
      $(this).removeClass("type-active");
    });
  }

  $.scrollify({
		section:".panel",
    scrollbars:false,
    before:function(i,panels) {

      var ref = panels[i].attr("data-section-name");

      $(".paging .active").removeClass("active");

      $(".paging").find("a[href=\"#" + ref + "\"]").addClass("active");
    },
    afterRender:function() {
      var pagination = "<ul class=\"paging\">";
      var activeClass = "";
      $(".panel").each(function(i) {
        activeClass = "";
        if(i===0) {
          activeClass = "active";
        }
        pagination += "<li><a class=\"" + activeClass + "\" href=\"#" + $(this).attr("data-section-name") + "\"><span class=\"hover-text\">" + $(this).attr("data-section-name").charAt(0).toUpperCase() + $(this).attr("data-section-name").slice(1) + "</span></a></li>";
      });

      pagination += "</ul>";

      $(".home").append(pagination);
      /*

      Tip: The two click events below are the same:

      $(".pagination a").on("click",function() {
        $.scrollify.move($(this).attr("href"));
      });

      */
      $(".paging a").on("click",$.scrollify.move);
    }
  });

  $(".start").click(function(e) {
    $(".pricing-information").css({display: "block"});
	});

	$(".scroll,.scroll-btn").click(function(e) {
		e.preventDefault();

		$.scrollify.next();



	});
});
