$(document).ready(function(){

	$("#tresc").on("click", ".dodaj", function(){
		var id = $(this).closest(".ksiazka").data("id");
		// $.post('php/koszyk.php', {idk: id}, function(data, status){
		$.post("php/dodaj_do_koszyka.php", {'idKsiazki': id}, function(data, status){
			alert(data); //dane ktore wrocily z koszyka
		});
	// alert(id);

		// $("#tresc").load("php/koszyk.php");
	})

	$("#ksiazki").on("click", function(){
		$("#tresc").load("php/ksiazki.php");
	})

	$("#koszyk").on("click", function(){
		$("article").load("php/koszyk.php");
	})

	$("#tresc").on("click", ".delete", function(){
		var id = $(this).closest("tr").attr("data-id");
		$.post("php/usun_z_koszyka.php", {'idUsuwanego': id}, function(data, status){
		});
		$("#tresc").load("php/koszyk.php");
	});



});