var site={
	init: function(){
		site.chopTabs();
		site.packetSwitcher();
		site.priceFormat();
		site.sliderMain();
		site.orderNew();
		site.reg();
	},
	
	chopTabs: function(){
		$(".js-tab").on("click", function(e){
			e.preventDefault();
			$(".js-tabblock, .js-tab").removeClass("selected");
			$("#js-block"+$(this).data("id")).addClass("selected");
			$("html,body").animate({
				scrollTop: $("#js-block").offset().top
            }, 300);
			$("#js-tab"+$(this).data("id")).addClass("selected");
		});
		
		$(".js-chopitem-rate-switcher").on("click", function(e){
			e.preventDefault();
			var $this = $(this);
			$(".js-chopitem-rate-switcher").removeClass("selected");
			$this.addClass("selected");
			$(".js-chopitem-rate").hide();
			$("#js-rate-chop-"+$this.data("value")).show();
		});
	},
	
	sliderMain: function(){
		$("#slider-main").length && $("#slider-main").slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			autoplay: false,
			//autoplaySpeed: 4000,
			dots: true,
			dotsClass: "promo-main__dots"
		});
		$("#stories-main").length && $("#stories-main").slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			dots: true,
			infinite: false,
			arrows: false,
			autoplay: false,
			dotsClass: "stories-main__dots",
			speed: 300,
			adaptiveHeight: true,
			responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 980,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 460,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: true
                    }
                }
            ]
		});
	},
	
	priceFormat: function(){
		$(".js-price").length && $(".js-price").each(function(i){
			$(this).text(site.priceFormatting($(this).text()));
		});
	},
	
	packetSwitcher: function(){
		site.packetPrice();
		$(".js-switcher-p").change(function(){
			var switcherID = $(this).attr("id"),
				switcherName = $(this).data("name");
			$("#js-"+switcherID).toggle(this.checked);
			$("#js-"+switcherID+"-no").toggle(!this.checked);
			if (!this.checked){
				$("#js-total-"+switcherName).hide();
				$("#js-"+switcherID+" .js-input-radio").prop("checked", false);
				$(".js-"+switcherID+"-price").hide();
				$("#"+switcherName+"ID").val("");
				site.packetPrice();
				site.priceFormat();
			} else {
				$("#js-total-"+switcherName).show();
				$("#js-"+switcherID+" .js-input-radio:first").prop("checked", true);
				$(".js-"+switcherID+"-price:first").show();
				$("#js-"+switcherName+"-price").text($("#js-"+switcherID+" .js-input-radio:checked").data("price"));
				$("#"+switcherName+"ID").val($("#js-"+switcherID+" .js-input-radio:first").val());
				site.packetPrice();
				site.priceFormat();
			}
		}).change();
		
		$(".js-packet-radio").change(function(){
			var radioID = $(this).data("id"),
				radioName = $(this).data("name"),
				radioPrice = $(this).data("price");
			$(".js-packet-"+radioName+"-price").hide();
			$("#"+radioName+"-price"+radioID).show();
			$("#js-"+radioName+"-price").text(radioPrice);
			$("#"+radioName+"ID").val(radioID);
			site.packetPrice();
			site.priceFormat();
		});
	},
	
	packetPrice: function(){
		var complectPrice = $("#js-complect-price").length && parseInt($("#js-complect-price").text().replace(/\s/g, '')),
			abonplataPrice = $(".js-packet-radio[name='abonplata-service']:checked").length && $("#js-abonplata-price").length && parseInt($(".js-packet-radio[name='abonplata-service']:checked").data("price")),
			strahovkaPrice = $(".js-packet-radio[name='strahovka']:checked").length && parseInt($(".js-packet-radio[name='strahovka']:checked").data("price"));
		$("#js-fullprice").text(complectPrice + abonplataPrice + strahovkaPrice);
	},
	
	priceFormatting: function(price){
		return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
	},
	
	orderNew: function(){
		$("#js-neworder").length && $("#js-neworder").on("click", function(e){
			e.preventDefault();
			var $form = $("#js-packet-form");
			$.ajax({
				url: $form.attr("action"),
				type: $form.attr("method"),
				data: $form.serialize(),
				dataType: "json",
				success: function(d){},
				error: function(e){}
			});
			location.replace("/order/");
		});
	},
	
	reg: function(){
		var $mail = $("#reg-login");
		$("#reg-phonenumber").on("change keyup", function(){
			$mail.val(this.value);
		});
	}
}
$(document).ready(site.init);