$(document).ready(function(){
	var table_res = $('#example').DataTable({
		"processing": true,
		// "serverSide": true,
		"oLanguage" : {
			"sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
			"sZeroRecords": "Aucun enregistrement",
			"sSearch":"rechercher",
			"sInfo": "Affichage de _START_ &agrave;  _TOTAL_ enregistrements",
			"sInfoEmpty": "Voir 0 to 0 of 0 enregistrement",
			"sInfoFiltered": "(filtré de _MAX_ total enregistrement)",
			"sProcessing": "Chargement...",
			"oPaginate": {
				'sFirst': 'D\351but',
				'sLast': 'Fin',
				'sNext': 'Suivant',
				'sPrevious': 'Pr&eacutec&eacutedent'
			},
		},
		"iDisplayLength": 10,
		"iDisplayStart": 0,
		"ajax": {
			"url" : "index/getdata"
		},
		
		"columns": [
			{ "data": "lot_id" },
			{ "data": "commande_id" },
			{ "data": "nb_plis" }
		],
	});
	
	$('#example tbody').css('cursor','pointer');
	$('#example tbody').on('click','tr',function (){
		var resu = table_res.row(this).data();
		//alert(resu.lot_id);
		var lot_id = resu.lot_id;
		$("#info_pli").bPopup();
		$.ajax({
			type: 'GET',
			url: 'index/getbyid',
			data: { lot_id: lot_id },
			success: function(resu) {
				$("#content_info").html(resu);
			}
		})
		 $('#enreg').css('display','none');
	});
	
	
	$('#modif_lot').click(function(){
		// $("#cmd").removeaAttr('disabled');
		 $('#cmd').prop("disabled", false);
		 $('#lots').prop("disabled", true);
		 $('#debt').prop("disabled", false);
		 $('#nbpli').prop("disabled", false);
		 $('#nlot').prop("disabled", false);
		 $('#enreg').css('display','inline');
		 $('#annul').css('display','inline');
	})	
	
	$('#annul').click(function(){
		// $("#cmd").removeaAttr('disabled');
		 $('#cmd').prop("disabled", true);
		 $('#lots').prop("disabled", true);
		 $('#debt').prop("disabled", true);
		 $('#nbpli').prop("disabled", true);
		 $('#nlot').prop("disabled", true);
		 $('#enreg').css('display','none');
		 $('#annul').css('display','none');
	})
	
	
	$('#enreg').click(function(){
		var lots = $('#lots').val();
		var cmd = $('#cmd').val();
		var debt = $('#debt').val();
		var nbpli = $('#nbpli').val();
		var nlot = $('#nlot').val();
		$.ajax({
			type: 'GET',
			url: 'index/modifier',
			data: { 
				lots: lots,
				cmd: cmd,
				debt: debt,
				nbpli: nbpli,
				nlot: nlot,
				
			},
			success: function(resu) {
				
				bclose();
			}
		});
	})
	
});

 function bclose() {
        parent.$("#popup").bPopup().close();
        return false;
    }