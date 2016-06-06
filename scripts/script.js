$(document).ready(function(){

	$("section").on("click", ".dodaj", function(){
		var id = $(this).closest(".ksiazka").data("id");
		// $.post('php/koszyk.php', {idk: id}, function(data, status){
			$.post("php/dodaj_do_koszyka.php", {'idKsiazki': id}, function(data, status){
			alert(data); //dane ktore wrocily z koszyka
		});
	});

	$("nav").on("click", "#ksiazki", function(){
		$("#tresc").load("php/ksiazki.php");
	});


	$("nav").on("click", "#koszyk", function(){
		$("article").load("php/koszyk.php");
	});

	$("nav").on("click", "#zaloguj", function(){
		$("#tresc").load("php/zaloguj.html form");
	});

	$("nav").on("click", "#wyloguj", function(){
		$("#tresc").load("php/wyloguj.php");
		$("nav").load("index.php #menu");
	});

	$("#tresc, #formularz").submit(function(e){
		e.preventDefault();
		// alert("submited!");
		if($("#login").val() !="" && $("#haslo").val() !=""){

			$.post("php/logowanie.php", {
				login: $("#login").val(),
				haslo: $("#haslo").val()
			}, function(data, status){
				alert(data);
				$("nav").load("index.php #menu");
				$("section").load("index.php #tresc");
			});
		} else {
			alert("Wypelnij wszystkie pola!");
		}

	});


	$("#tresc").on("click", ".delete", function(){
		var id = $(this).closest("tr").attr("data-id");
		$.post("php/usun_z_koszyka.php", {'idUsuwanego': id}, function(data, status){
		});
		$("#tresc").load("php/koszyk.php");
	});

	$("section").on("click", "#zamow", function(){
		//zczytuje forme przsylki i przekazuje ja dalej
		var kosztPrzesylki = $("section #przesylka").val();
		// alert(kosztPrzesylki);
		$.post("php/zamow.php", {koszt: kosztPrzesylki}, function(data){
			alert(data);
		});
	});

	$("section").on("click", "#wartosc", function(){
		var sum = 0;
		$(".cena").each(function(){
			// alert($(this).text());
			sum += parseFloat($(this).text());
		});
		var kosztPrzesylki = $("section #przesylka").val();
		sum += parseFloat(kosztPrzesylki);
			// alert(sum);
			$("section #suma").html("Wartosc zamowienia: "+sum+"zł");
	});

	

});