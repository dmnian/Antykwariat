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

	$("nav").on("click", "#zarejestruj", function(){
		$("#tresc").load("php/zarejestruj.html form");
	});

	$("nav").on("click", "#zamowienia", function(){
		$("#tresc").load("php/zamowienia.php");
	});

	$("nav").on("click", "#wyloguj", function(){
		$("#tresc").load("php/wyloguj.php");
		$("nav").load("index.php #menu");
	});


	$("#tresc").on("submit", "#formRejestracja", function(ev){
		ev.preventDefault();

		// alert("cos sie dzieje");


		if($("#loginR").val().length <= 2) alert("login musi byc dluzszy");  
		if($("#hasloR").val() !== $("#hasloR2").val()) alert("hasla nie sa takie same!"); 
		if($("#hasloR").val().length <= 5) alert("haslo musi posiadac co najmniej 5 znakow!"); 
		if($("#imie").val() =="") alert("pole imie jest obowiazkowe!");
		if($("#nazwisko").val() =="") alert("pole nazwisko jest obowiazkowe!");


		if(($("#loginR").val().length > 2)&& ($("#hasloR").val() === $("#hasloR2").val()) && ($("#hasloR").val().length > 5) &&($("#imie").val() !=="") &&($("#nazwisko").val() !=="") && ($("#mail").val() !== "")){
			alert("da sie");

			var login = $("#loginR").val();
			var haslo = $("#hasloR").val();
			var imie = $("#imie").val();
			var nazwisko = $("#nazwisko").val();
			var email = $("#email").val();

			// alert(email);
			 $.post("php/rejestracja.php", {
			 	login: login,
			 	haslo: haslo,
			 	imie: imie,
			 	nazwisko: nazwisko,
			 	email: email
			 }, function(data, status){
			 	alert(data);
			 });
		}
		

	});

	$("#tresc").on("submit", "#formularz", function(e){
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


	$("section").on("click", ".delete", function(){
		// alert("klikłeś");
		var id = $(this).closest("tr").attr("data-id");
		$.post("php/usun_z_koszyka.php", {'idUsuwanego': id}, function(data, status){
			// alert(data);
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
		$("#tresc").load("php/koszyk.php");
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
			$("section #suma").html("Wartosc zamowienia: "+sum.toFixed(2)+"zł");
		});

	

});