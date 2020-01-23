$(document).ready(function(){
     
  $(function(){


$("#search").on("keyup", function() {
		var regval = new RegExp( '^'+ $(this).val(),"i" );
 
		$("table tr:gt(0)").hide()
     $("table tr:gt(0)").filter( function(){
     var contenu=$(this).find( 'td:eq(1)' ).html();
    return contenu.match( regval ) ;}).show();
    })

}) 


   $(".dropdown-menu a").click(function(e){
    e.preventDefault();
    var selText = $(this).text();
      if(selText==='supprimer en effacant ses recettes'){
         
          $(".remplir").empty();
                      
      
   $(".remplir").load('./supprimerutilisateur.php');
      }
      if(selText==='desactiver son compte'){
          $(".remplir").empty();
            $(".remplir").load('./desactivationvue.php');
      }
      
      if(selText==='supprimer en laissant ses recettes'){
          $(".remplir").empty();
            $(".remplir").load('./supprimerutillaisserrecette.php');
      }
      
      
});
    
 $(":submit").click(function (e){
      
   
      $(".form-horizontal").submit();
});



});