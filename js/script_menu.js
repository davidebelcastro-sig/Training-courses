$("#menu_prog").on("click",function(){
        $("#content").load("view/progetti.php");
});
$("#menu_ins_prog").on("click",function(){
        $("#content").load("view/aggiungi_progetto.php");
});
$("#menu_enti").on("click",function(){
        $("#content").load("view/enti.php");
});
$("#menu_ins_enti").on("click",function(){
        $("#content").load("view/aggiungi_ente.php");
});
$("#menu_anag").on("click",function(){
        $("#content").load("view/anagrafiche.php");
});
$("#menu_ins_anag").on("click",function(){
        $("#content").load("view/aggiungi_anagrafica.php");
});
$("#menu_corsi").on("click",function(){
        $("#content").load("view/corsi.php");
});
$("#menu_ins_corsi").on("click",function(){
        $("#content").load("view/aggiungi_corso.php");
});
$("#menu_aule").on("click",function(){
        $("#content").load("view/aule.php");
});
$("#menu_ins_aule").on("click",function(){
        $("#content").load("view/aggiungi_aula.php");
});
$("#menu_allievi").on("click",function(){
        $("#content").load("view/allievi.php");
});
$("#menu_ins_allievi").on("click",function(){
        $("#content").load("view/aggiungi_allievo.php");
});

$("#menu_agenda").on("click",function(){
        $("#content").load("agenda/index.php");
	  
});

$("#menu_reg").on("click",function(){
        $("#content").load("agenda/registro_doc.php");
});
$("#menu_reg_all").on("click",function(){
        $("#content").load("agenda/registro_all.php");
});
$("#menu_docenti").on("click",function(){
        $("#content").load("view/docenti.php");
});
$("#menu_ins_docenti").on("click",function(){
        $("#content").load("view/aggiungi_docente.php");
});
$("#menu_moduli").on("click",function(){
        $("#content").load("view/moduli.php");
});

$("#menu_ins_moduli").on("click",function(){
        $("#content").load("view/aggiungi_modulo.php");
});


$("#menu_impostazioni1").on("click",function(){
        $("#content").load("insert_job/add_docenti_modulo.php");

});


$("#menu_impostazioni2").on("click",function(){
        $("#content").load("insert_job/add_allievi_modulo.php");
});



$("#menu_impostazioni3").on("click",function(){
        $("#content").load("insert_job/rem_docenti_modulo.php");
});


$("#menu_impostazioni4").on("click",function(){
        $("#content").load("insert_job/rem_allievi_modulo.php");
});

